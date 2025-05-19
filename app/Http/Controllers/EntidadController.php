<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EntidadController extends Controller
{
    // Listar todas las entidades
    public function index()
    {
        try {
            $entidades = Entidad::all();
            return response()->json([
                'message' => 'Lista de entidades obtenida correctamente.',
                'data' => $entidades
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener las entidades.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener una entidad
    public function show($id)
    {
        try {
            $entidad = Entidad::find($id);

            if ($entidad) {
                return response()->json([
                    'message' => 'Entidad encontrada correctamente.',
                    'data' => $entidad
                ]);
            } else {
                return response()->json(['error' => 'Entidad no encontrada.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener la entidad.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Crear una nueva entidad
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string',
                'tipo' => 'required|in:hermandad,ayuntamiento,otro',
                'persona_contacto' => 'required|string',
                'telefono' => 'required|string',
                'email_contacto' => 'required|email',
            ]);

            $entidad = Entidad::create($validated);

            return response()->json([
                'message' => 'Entidad creada correctamente.',
                'data' => $entidad
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la entidad.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Actualizar una entidad existente
    public function update(Request $request, $id)
    {
        try {
            $entidad = Entidad::findOrFail($id);

            $validated = $request->validate([
                'nombre' => 'sometimes|required|string',
                'tipo' => 'sometimes|required|in:hermandad,ayuntamiento,otro',
                'persona_contacto' => 'sometimes|required|string',
                'telefono' => 'sometimes|required|string',
                'email_contacto' => 'sometimes|required|email',
            ]);

            $entidad->update($validated);

            return response()->json([
                'message' => 'Entidad actualizada correctamente.',
                'data' => $entidad
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Entidad no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar la entidad.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Eliminar una entidad
    public function destroy($id)
    {
        try {
            $entidad = Entidad::findOrFail($id);
            $entidad->delete();

            return response()->json([
                'message' => 'Entidad eliminada correctamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Entidad no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la entidad.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
