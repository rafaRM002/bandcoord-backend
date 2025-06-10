<?php

namespace App\Http\Controllers;

use App\Models\TipoInstrumento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

/**
 * @group Gestión de Tipos de Instrumentos
 *
 * APIs para gestionar los tipos de instrumentos en el sistema
 */
class TipoInstrumentoController extends Controller
{
    /**
     * Listar todos los tipos de instrumentos
     *
     * Obtiene una lista de todos los tipos de instrumentos disponibles en el sistema.
     *
     * @response 200 {
     *  "message": "Tipos de instrumentos obtenidos correctamente.",
     *  "data": [
     *    {
     *      "id": 1,
     *      "instrumento": "Guitarra",
     *      "cantidad": 5,
     *      "created_at": "2025-06-10T12:00:00.000000Z",
     *      "updated_at": "2025-06-10T12:00:00.000000Z"
     *    }
     *  ]
     * }
     * @response 500 {
     *  "error": "Error al obtener los tipos de instrumentos.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Obtener un tipo de instrumento específico
     *
     * Muestra la información detallada de un tipo de instrumento específico.
     *
     * @urlParam id required El ID del tipo de instrumento. Example: 1
     *
     * @response 200 {
     *  "message": "Tipo de instrumento obtenido correctamente.",
     *  "data": {
     *    "id": 1,
     *    "instrumento": "Guitarra",
     *    "cantidad": 5,
     *    "created_at": "2025-06-10T12:00:00.000000Z",
     *    "updated_at": "2025-06-10T12:00:00.000000Z"
     *  }
     * }
     * @response 404 {
     *  "error": "Tipo de instrumento no encontrado."
     * }
     * @response 500 {
     *  "error": "Error al obtener el tipo de instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Crear un nuevo tipo de instrumento
     *
     * Crea un nuevo tipo de instrumento con los datos proporcionados.
     *
     * @bodyParam instrumento string required Nombre del instrumento. Example: Violín
     * @bodyParam cantidad integer required Cantidad disponible del instrumento. Example: 3
     *
     * @response 201 {
     *  "message": "Tipo de instrumento creado correctamente.",
     *  "data": {
     *    "id": 2,
     *    "instrumento": "Violín",
     *    "cantidad": 3,
     *    "created_at": "2025-06-10T12:00:00.000000Z",
     *    "updated_at": "2025-06-10T12:00:00.000000Z"
     *  }
     * }
     * @response 422 {
     *  "error": "Datos de entrada inválidos.",
     *  "details": {
     *    "instrumento": ["El instrumento ya existe."],
     *    "cantidad": ["La cantidad debe ser al menos 1."]
     *  }
     * }
     * @response 500 {
     *  "error": "Error al crear el tipo de instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Actualizar un tipo de instrumento existente
     *
     * Actualiza los datos de un tipo de instrumento específico.
     *
     * @urlParam id required El ID del tipo de instrumento. Example: 1
     * @bodyParam instrumento string El nombre del instrumento. Example: Guitarra Eléctrica
     * @bodyParam cantidad integer La cantidad disponible del instrumento. Example: 4
     *
     * @response {
     *  "message": "Tipo de instrumento actualizado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "instrumento": "Guitarra Eléctrica",
     *    "cantidad": 4,
     *    "created_at": "2025-06-10T12:00:00.000000Z",
     *    "updated_at": "2025-06-10T12:00:00.000000Z"
     *  }
     * }
     * @response 404 {
     *  "error": "Tipo de instrumento no encontrado."
     * }
     * @response 422 {
     *  "error": "Datos de entrada inválidos.",
     *  "details": {
     *    "instrumento": ["El instrumento ya existe."],
     *    "cantidad": ["La cantidad debe ser al menos 1."]
     *  }
     * }
     * @response 500 {
     *  "error": "Error al actualizar el tipo de instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Eliminar un tipo de instrumento
     *
     * Elimina un tipo de instrumento específico del sistema.
     *
     * @urlParam id required El ID del tipo de instrumento. Example: 1
     *
     * @response 200 {
     *  "message": "Tipo de instrumento eliminado correctamente."
     * }
     * @response 404 {
     *  "error": "Tipo de instrumento no encontrado."
     * }
     * @response 500 {
     *  "error": "Error al eliminar el tipo de instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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
