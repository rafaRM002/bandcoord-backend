<?php

namespace App\Http\Controllers;

use App\Models\MinimoEvento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * @group Gestión de Mínimos por Evento
 *
 * APIs para gestionar los mínimos de instrumentos requeridos por evento
 */
class MinimoEventoController extends Controller
{
    /**
     * Listar Mínimos por Evento
     *
     * Obtiene un listado de todos los mínimos de instrumentos requeridos por cada evento.
     *
     * @response 200 {
     *     "message": "Listado de mínimos por evento obtenido correctamente.",
     *     "data": [{
     *         "evento_id": 1,
     *         "instrumento_tipo_id": "GUITARRA",
     *         "cantidad": 2,
     *         "evento": {
     *             "id": 1,
     *             "nombre": "Concierto Example"
     *         },
     *         "tipoInstrumento": {
     *             "instrumento": "GUITARRA",
     *             "nombre": "Guitarra"
     *         }
     *     }]
     * }
     * @response 500 {
     *     "error": "Error al obtener los mínimos por evento.",
     *     "message": "Mensaje de error específico"
     * }
     */
    public function index()
    {
        try {
            $minimos = MinimoEvento::with('evento', 'tipoInstrumento')->get();
            return response()->json([
                'message' => 'Listado de mínimos por evento obtenido correctamente.',
                'data' => $minimos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener los mínimos por evento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener Mínimo Específico
     *
     * Obtiene el detalle de un mínimo de instrumento específico para un evento.
     *
     * @urlParam evento_id integer required ID del evento. Example: 1
     * @urlParam instrumento_tipo_id string required ID del tipo de instrumento. Example: GUITARRA
     *
     * @response 200 {
     *     "message": "Mínimo de instrumento obtenido correctamente.",
     *     "data": {
     *         "evento_id": 1,
     *         "instrumento_tipo_id": "GUITARRA",
     *         "cantidad": 2,
     *         "evento": {
     *             "id": 1,
     *             "nombre": "Concierto Example"
     *         },
     *         "tipoInstrumento": {
     *             "instrumento": "GUITARRA",
     *             "nombre": "Guitarra"
     *         }
     *     }
     * }
     * @response 404 {
     *     "error": "Mínimo de instrumento no encontrado."
     * }
     */
    public function show($evento_id, $instrumento_tipo_id)
    {
        try {
            $minimo = MinimoEvento::with('evento', 'tipoInstrumento')
                ->where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->firstOrFail();

            return response()->json([
                'message' => 'Mínimo de instrumento obtenido correctamente.',
                'data' => $minimo
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Mínimo de instrumento no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener el mínimo de instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear Mínimo por Evento
     *
     * Crea un nuevo registro de mínimo de instrumentos requeridos para un evento.
     *
     * @bodyParam evento_id integer required ID del evento. Example: 1
     * @bodyParam instrumento_tipo_id string required ID del tipo de instrumento. Example: GUITARRA
     * @bodyParam cantidad integer required Cantidad mínima requerida del instrumento. Mínimo: 1. Example: 2
     *
     * @response 201 {
     *     "message": "Mínimo de instrumento creado correctamente.",
     *     "data": {
     *         "evento_id": 1,
     *         "instrumento_tipo_id": "GUITARRA",
     *         "cantidad": 2
     *     }
     * }
     * @response 422 {
     *     "error": {
     *         "evento_id": ["El evento seleccionado no existe."],
     *         "instrumento_tipo_id": ["El tipo de instrumento ya existe para este evento."],
     *         "cantidad": ["La cantidad debe ser al menos 1."]
     *     }
     * }
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'evento_id' => 'required|exists:eventos,id',
                'instrumento_tipo_id' => [
                    'required',
                    'exists:tipo_instrumentos,instrumento',
                    Rule::unique('minimo_eventos')->where(function ($query) use ($request) {
                        return $query->where('evento_id', $request->evento_id);
                    }),
                ],
                'cantidad' => 'required|integer|min:1',
            ]);

            $minimo = MinimoEvento::create($validated);

            return response()->json([
                'message' => 'Mínimo de instrumento creado correctamente.',
                'data' => $minimo
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el mínimo de instrumento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar Mínimo por Evento
     *
     * Actualiza la cantidad mínima requerida de un instrumento para un evento específico.
     *
     * @urlParam evento_id integer required ID del evento. Example: 1
     * @urlParam instrumento_tipo_id string required ID del tipo de instrumento. Example: GUITARRA
     * @bodyParam cantidad integer required Nueva cantidad mínima requerida. Mínimo: 1. Example: 3
     *
     * @response {
     *     "message": "Registro actualizado correctamente."
     * }
     * @response 404 {
     *     "message": "No se encontró el registro para actualizar."
     * }
     * @response 422 {
     *     "error": {
     *         "cantidad": ["La cantidad debe ser al menos 1."]
     *     }
     * }
     */
    public function update(Request $request, $evento_id, $instrumento_tipo_id)
    {
        try {
            // Validamos la cantidad
            $validated = $request->validate([
                'cantidad' => 'required|integer|min:1',
            ]);

            // Buscamos el registro en la tabla 'minimo_eventos' usando la clave compuesta
            $registro = DB::table('minimo_eventos')
                ->where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->first();

            // Si no existe el registro, devolvemos un error 404 con un mensaje
            if (!$registro) {
                return response()->json(['message' => 'No se encontró el registro para actualizar.'], 404);
            }

            // Si lo encontramos, actualizamos la cantidad con el valor
            DB::table('minimo_eventos')
                ->where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->update(['cantidad' => $validated['cantidad']]);

            // Devolvemos una respuesta indicando que se actualizó correctamente
            return response()->json(['message' => 'Registro actualizado correctamente.']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el mínimo de instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Eliminar Mínimo por Evento
     *
     * Elimina un registro de mínimo de instrumentos requeridos para un evento.
     *
     * @urlParam evento_id integer required ID del evento. Example: 1
     * @urlParam instrumento_tipo_id string required ID del tipo de instrumento. Example: GUITARRA
     *
     * @response {
     *     "message": "Registro eliminado correctamente."
     * }
     * @response 404 {
     *     "error": "Registro no encontrado."
     * }
     */
    public function destroy($evento_id, $instrumento_tipo_id)
    {
        try {
            // Buscar y eliminar el registro
            $deleted = MinimoEvento::where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->delete();

            if ($deleted) {
                return response()->json(['message' => 'Registro eliminado correctamente.'], 200);
            } else {
                return response()->json(['error' => 'Registro no encontrado.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el registro.', 'message' => $e->getMessage()], 500);
        }
    }
}
