<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MensajeController extends Controller
{
    // Listar todos los mensajes
    public function index()
    {
        try {
            $mensajes = Mensaje::with('emisor')->get();

            return response()->json([
                'message' => 'Mensajes obtenidos correctamente.',
                'data' => $mensajes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener los mensajes.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener un mensaje
    public function show($id)
    {
        try {
            $mensaje = Mensaje::with('emisor')->findOrFail($id);

            return response()->json([
                'message' => 'Mensaje obtenido correctamente.',
                'data' => $mensaje
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Mensaje no encontrado.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener el mensaje.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Crear un nuevo mensaje
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'asunto' => 'required|string|max:255',
                'contenido' => 'required|string',
                'usuario_id_emisor' => 'required|exists:usuarios,id',
            ]);

            $mensaje = Mensaje::create($validated);

            return response()->json([
                'message' => 'Mensaje creado correctamente.',
                'data' => $mensaje
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el mensaje.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Actualizar un mensaje existente
    public function update(Request $request, $id)
    {
        try {
            $mensaje = Mensaje::findOrFail($id);

            $validated = $request->validate([
                'asunto' => 'sometimes|required|string|max:255',
                'contenido' => 'sometimes|required|string',
                'usuario_id_emisor' => 'sometimes|required|exists:usuarios,id',
            ]);

            $mensaje->update($validated);

            return response()->json([
                'message' => 'Mensaje actualizado correctamente.',
                'data' => $mensaje
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Mensaje no encontrado.'], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el mensaje.', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar un mensaje
    public function destroy($id)
    {
        try {
            $mensaje = Mensaje::findOrFail($id);
            $mensaje->delete();

            return response()->json([
                'message' => 'Mensaje eliminado correctamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Mensaje no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el mensaje.', 'message' => $e->getMessage()], 500);
        }
    }
}
