<?php

namespace App\Http\Controllers;

use App\Models\TipoInstrumento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class TipoInstrumentoController extends Controller
{
    // Listar todos los tipos de instrumentos
    public function index()
    {
        try {
            $tipos = TipoInstrumento::all();
            return response()->json([
                'message' => 'Tipos de instrumentos obtenidos correctamente.',
                'data' => $tipos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener los tipos de instrumentos.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener un tipo de instrumento específico
    public function show($id)
    {
        try {
            $tipo = TipoInstrumento::findOrFail($id);
            return response()->json([
                'message' => 'Tipo de instrumento obtenido correctamente.',
                'data' => $tipo
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Tipo de instrumento no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener el tipo de instrumento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Crear un nuevo tipo de instrumento
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'instrumento' => 'required|string|unique:tipo_instrumentos,instrumento',
                'cantidad' => 'required|integer|min:1',
            ]);

            $tipo = TipoInstrumento::create($validated);

            return response()->json([
                'message' => 'Tipo de instrumento creado correctamente.',
                'data' => $tipo
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Datos de entrada inválidos.',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el tipo de instrumento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Actualizar un tipo de instrumento existente
    public function update(Request $request, $id)
    {
        try {
            $tipo = TipoInstrumento::findOrFail($id);

            $validated = $request->validate([
                'instrumento' => 'sometimes|required|string|unique:tipo_instrumentos,instrumento,' . $id,
                'cantidad' => 'sometimes|required|integer|min:1',
            ]);

            $tipo->update($validated);

            return response()->json([
                'message' => 'Tipo de instrumento actualizado correctamente.',
                'data' => $tipo
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Tipo de instrumento no encontrado.'], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Datos de entrada inválidos.',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar el tipo de instrumento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Eliminar un tipo de instrumento
    public function destroy($id)
    {
        try {
            $tipo = TipoInstrumento::findOrFail($id);
            $tipo->delete();

            return response()->json([
                'message' => 'Tipo de instrumento eliminado correctamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Tipo de instrumento no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el tipo de instrumento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
