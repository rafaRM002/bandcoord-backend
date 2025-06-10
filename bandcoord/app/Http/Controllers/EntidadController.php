<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group Gestión de Entidades
 *
 * APIs para gestionar entidades en el sistema
 */
class EntidadController extends Controller
{
    /**
     * Listar entidades
     *
     * Obtiene una lista de todas las entidades registradas en el sistema.
     *
     * @response 200 {
     *     "message": "Lista de entidades obtenida correctamente.",
     *     "data": [
     *         {
     *             "id": 1,
     *             "nombre": "Hermandad Example",
     *             "tipo": "hermandad",
     *             "persona_contacto": "Juan Pérez",
     *             "telefono": "123456789",
     *             "email_contacto": "contacto@hermandad.com",
     *             "created_at": "2025-06-10T12:00:00.000000Z",
     *             "updated_at": "2025-06-10T12:00:00.000000Z"
     *         }
     *     ]
     * }
     * @response 500 {
     *     "error": "Error al obtener las entidades.",
     *     "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Obtener entidad específica
     *
     * Recupera la información de una entidad específica por su ID.
     *
     * @urlParam id required El ID de la entidad. Example: 1
     *
     * @response 200 {
     *     "message": "Entidad encontrada correctamente.",
     *     "data": {
     *         "id": 1,
     *         "nombre": "Hermandad Example",
     *         "tipo": "hermandad",
     *         "persona_contacto": "Juan Pérez",
     *         "telefono": "123456789",
     *         "email_contacto": "contacto@hermandad.com",
     *         "created_at": "2025-06-10T12:00:00.000000Z",
     *         "updated_at": "2025-06-10T12:00:00.000000Z"
     *     }
     * }
     * @response 404 {
     *     "error": "Entidad no encontrada."
     * }
     * @response 500 {
     *     "error": "Error al obtener la entidad.",
     *     "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Crear entidad
     *
     * Crea una nueva entidad con los datos proporcionados.
     *
     * @bodyParam nombre string required Nombre de la entidad. Example: Hermandad Example
     * @bodyParam tipo string required Tipo de entidad (hermandad/ayuntamiento/otro). Example: hermandad
     * @bodyParam persona_contacto string required Nombre de la persona de contacto. Example: Juan Pérez
     * @bodyParam telefono string required Número de teléfono de contacto. Example: 123456789
     * @bodyParam email_contacto string required Email de contacto. Example: contacto@hermandad.com
     *
     * @response 201 {
     *     "message": "Entidad creada correctamente.",
     *     "data": {
     *         "id": 1,
     *         "nombre": "Hermandad Example",
     *         "tipo": "hermandad",
     *         "persona_contacto": "Juan Pérez",
     *         "telefono": "123456789",
     *         "email_contacto": "contacto@hermandad.com",
     *         "created_at": "2025-06-10T12:00:00.000000Z",
     *         "updated_at": "2025-06-10T12:00:00.000000Z"
     *     }
     * }
     * @response 422 {
     *     "message": "The given data was invalid.",
     *     "errors": {
     *         "nombre": ["El campo nombre es obligatorio."],
     *         "tipo": ["El campo tipo debe ser hermandad, ayuntamiento u otro."]
     *     }
     * }
     * @response 500 {
     *     "error": "Error al crear la entidad.",
     *     "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Actualizar entidad
     *
     * Actualiza la información de una entidad existente.
     *
     * @urlParam id required El ID de la entidad a actualizar. Example: 1
     * @bodyParam nombre string Nombre de la entidad. Example: Hermandad Example
     * @bodyParam tipo string Tipo de entidad (hermandad/ayuntamiento/otro). Example: hermandad
     * @bodyParam persona_contacto string Nombre de la persona de contacto. Example: Juan Pérez
     * @bodyParam telefono string Número de teléfono de contacto. Example: 123456789
     * @bodyParam email_contacto string Email de contacto. Example: contacto@hermandad.com
     *
     * @response {
     *     "message": "Entidad actualizada correctamente.",
     *     "data": {
     *         "id": 1,
     *         "nombre": "Hermandad Example",
     *         "tipo": "hermandad",
     *         "persona_contacto": "Juan Pérez",
     *         "telefono": "123456789",
     *         "email_contacto": "contacto@hermandad.com",
     *         "created_at": "2025-06-10T12:00:00.000000Z",
     *         "updated_at": "2025-06-10T12:00:00.000000Z"
     *     }
     * }
     * @response 404 {
     *     "error": "Entidad no encontrada."
     * }
     * @response 422 {
     *     "message": "The given data was invalid.",
     *     "errors": {
     *         "tipo": ["El campo tipo debe ser hermandad, ayuntamiento u otro."]
     *     }
     * }
     * @response 500 {
     *     "error": "Error al actualizar la entidad.",
     *     "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Eliminar entidad
     *
     * Elimina una entidad específica del sistema.
     *
     * @urlParam id required El ID de la entidad a eliminar. Example: 1
     *
     * @response {
     *     "message": "Entidad eliminada correctamente."
     * }
     * @response 404 {
     *     "error": "Entidad no encontrada."
     * }
     * @response 500 {
     *     "error": "Error al eliminar la entidad.",
     *     "message": "Mensaje de error específico"
     * }
     */
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
