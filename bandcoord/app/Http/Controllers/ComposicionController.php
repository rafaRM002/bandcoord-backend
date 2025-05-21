<?php

namespace App\Http\Controllers;

use App\Models\Composicion;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ImagesController;
use Illuminate\Support\Str;

class ComposicionController extends Controller
{
    // Listar todas las composiciones
    public function index()
    {
        try {
            $composiciones = Composicion::all();
            return response()->json([
                'message' => 'Lista de composiciones obtenida correctamente.',
                'data' => $composiciones
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener las composiciones.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener una composición
    public function show($id)
    {
        try {
            $composicion = Composicion::findOrFail($id);
            return response()->json([
                'message' => 'Composición encontrada correctamente.',
                'data' => $composicion
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Composición no encontrada.',
                'message' => 'La composición con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener la composición.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Crear una nueva composición
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'nombre_autor' => 'required|string|max:255',
                'files' => 'required|array|max:12',
                'iframe' => 'required|string|max:999',
            ]);

            $imageController = new ImagesController();

            $filesPath = [];
            $uploadFailed = false;
            $errorMessages = [];

            foreach ($request->file('files') as $file) {
                Log::info('Subiendo imagen...', ['file' => $file->getClientOriginalName()]);

                $responseData = $imageController->uploadImage($file);

                if (!$responseData['success']) {
                    $uploadFailed = true;
                    $errorMessages[] = 'No se pudo subir la imagen: ' . $file->getClientOriginalName();
                    Log::error('Fallo al subir imagen.', ['imagen' => $file->getClientOriginalName()]);
                } else {
                    $filesPath[] = basename($responseData['path']);
                    Log::info('Imagen subida exitosamente.', ['ruta' => $responseData['path']]);
                }
            }

            if ($uploadFailed) {
                Log::warning('Error en la subida de imágenes.', ['errores' => $errorMessages]);

                return response()->json([
                    'success' => false,
                    'message' => 'Algunas imágenes no se pudieron subir.',
                    'errors' => $errorMessages
                ], 400);
            }

            $composicion = new Composicion($validated);

            $composicion->ruta = json_encode([
                'youtube' => $request->input('iframe'),
                'files' => array_map(fn($file) => $file, $filesPath)
            ]);

            $composicion->save(); // ahora sí, todos los campos están definidos

            return response()->json([
                'message' => 'Composición creada correctamente.',
                'data' => $composicion
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al crear la composición.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id){
        try {
            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'descripcion' => 'sometimes|required|string',
                'nombre_autor' => 'sometimes|required|string|max:255',
                'iframe' => 'sometimes|string|max:999',
                'files' => 'sometimes|array|max:12',
                'files.*' => 'file|mimes:jpg,jpeg,png,pdf,mp3,mp4,webm',
                'files_existentes' => 'sometimes'
            ]);

            $composicion = Composicion::findOrFail($id);

            // Actualizar campos básicos
            if ($request->filled('nombre')) $composicion->nombre = $request->input('nombre');
            if ($request->filled('descripcion')) $composicion->descripcion = $request->input('descripcion');
            if ($request->filled('nombre_autor')) $composicion->nombre_autor = $request->input('nombre_autor');

            // Cargar ruta anterior
            $rutaActual = json_decode($composicion->ruta, true) ?? [];
            $filesAntiguos = $rutaActual['files'] ?? [];
            $youtubeActual = $rutaActual['youtube'] ?? '';

            // Obtener archivos existentes desde el request
            $filesExistentes = $request->input('files_existentes', []);
            if (is_string($filesExistentes)) {
                $filesExistentes = array_filter(explode(';', $filesExistentes));
            }

            $filesConservados = array_intersect($filesAntiguos, $filesExistentes);
            $filesFinales = $filesConservados;

            // Eliminar archivos eliminados
            $filesAEliminar = array_diff($filesAntiguos, $filesConservados);
            foreach ($filesAEliminar as $fileName) {
                $filePath = public_path('storage/files/' . $fileName);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Subir nuevos archivos si hay
            if ($request->hasFile('files')) {
                $imageController = new ImagesController();
                $uploadFailed = false;
                $errorMessages = [];

                foreach ($request->file('files') as $file) {
                    $responseData = $imageController->uploadImage($file);
                    if (!$responseData['success']) {
                        $uploadFailed = true;
                        $errorMessages[] = 'No se pudo subir la imagen: ' . $file->getClientOriginalName();
                    } else {
                        $filesFinales[] = basename($responseData['path']);
                    }
                }

                if ($uploadFailed) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Algunas imágenes no se pudieron subir.',
                        'errors' => $errorMessages
                    ], 400);
                }
            }

            // Actualizar iframe limpio
            $youtubeFinal = $request->filled('iframe') ? $request->input('iframe') : $youtubeActual;

            // Asignar ruta correctamente sin escapar slashes
            $composicion->ruta = collect([
                'youtube' => $youtubeFinal,
                'files' => array_values($filesFinales)
            ])->toJson(JSON_UNESCAPED_SLASHES);

            $composicion->save();

            return response()->json([
                'success' => true,
                'message' => 'Composición actualizada correctamente.',
                'data' => $composicion
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Composición no encontrada.',
                'message' => 'La composición con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error actualizando composición', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'error' => 'Hubo un problema al actualizar la composición.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Eliminar una composición
    public function destroy($id)
    {
        try {
            $composicion = Composicion::findOrFail($id);
            $composicion->delete();

            return response()->json([
                'message' => 'Composición eliminada correctamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Composición no encontrada.',
                'message' => 'La composición con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al eliminar la composición.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
