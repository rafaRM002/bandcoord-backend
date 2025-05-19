<?php

namespace App\Http\Controllers;

use App\Models\Composicion;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
                'ruta' => 'required|string|max:255',
            ]);

            $composicion = Composicion::create($validated);

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

    // Actualizar una composición existente
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'descripcion' => 'sometimes|required|string',
                'nombre_autor' => 'sometimes|required|string|max:255',
                'ruta' => 'sometimes|required|string|max:255',
            ]);

            $composicion = Composicion::findOrFail($id);
            $composicion->update($validated);

            return response()->json([
                'message' => 'Composición actualizada correctamente.',
                'data' => $composicion
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Composición no encontrada.',
                'message' => 'La composición con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
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
