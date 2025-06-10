<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group Gestión de Mensajes
 *
 * APIs para gestionar mensajes en el sistema
 */
class MensajeController extends Controller
{
    /**
     * Listar mensajes
     *
     * Obtiene una lista de todos los mensajes con información del emisor.
     *
     * @response 200 {
     *  "message": "Mensajes obtenidos correctamente.",
     *  "data": [
     *    {
     *      "id": 1,
     *      "asunto": "Ejemplo de asunto",
     *      "contenido": "Contenido del mensaje",
     *      "usuario_id_emisor": 1,
     *      "created_at": "2025-06-10T12:00:00Z",
     *      "updated_at": "2025-06-10T12:00:00Z",
     *      "emisor": {
     *        "id": 1,
     *        "nombre": "Usuario Ejemplo"
     *      }
     *    }
     *  ]
     * }
     * @response 500 {
     *  "error": "Error al obtener los mensajes.",
     *  "message": "Mensaje de error detallado"
     * }
     */
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

    /**
     * Obtener mensaje específico
     *
     * Obtiene la información detallada de un mensaje específico.
     *
     * @urlParam id required El ID del mensaje. Example: 1
     *
     * @response 200 {
     *  "message": "Mensaje obtenido correctamente.",
     *  "data": {
     *    "id": 1,
     *    "asunto": "Ejemplo de asunto",
     *    "contenido": "Contenido del mensaje",
     *    "usuario_id_emisor": 1,
     *    "created_at": "2025-06-10T12:00:00Z",
     *    "updated_at": "2025-06-10T12:00:00Z",
     *    "emisor": {
     *      "id": 1,
     *      "nombre": "Usuario Ejemplo"
     *    }
     *  }
     * }
     * @response 404 {
     *  "error": "Mensaje no encontrado."
     * }
     * @response 500 {
     *  "error": "Error al obtener el mensaje.",
     *  "message": "Mensaje de error detallado"
     * }
     */
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

    /**
     * Crear mensaje
     *
     * Crea un nuevo mensaje en el sistema.
     *
     * @bodyParam asunto string required El asunto del mensaje. Example: Reunión importante
     * @bodyParam contenido string required El contenido del mensaje. Example: Contenido detallado del mensaje
     * @bodyParam usuario_id_emisor integer required El ID del usuario que envía el mensaje. Example: 1
     *
     * @response 201 {
     *  "message": "Mensaje creado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "asunto": "Reunión importante",
     *    "contenido": "Contenido detallado del mensaje",
     *    "usuario_id_emisor": 1,
     *    "created_at": "2025-06-10T12:00:00Z",
     *    "updated_at": "2025-06-10T12:00:00Z"
     *  }
     * }
     * @response 422 {
     *  "error": {
     *    "asunto": ["El campo asunto es obligatorio."],
     *    "contenido": ["El campo contenido es obligatorio."],
     *    "usuario_id_emisor": ["El usuario especificado no existe."]
     *  }
     * }
     */
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

    /**
     * Actualizar mensaje
     *
     * Actualiza la información de un mensaje existente.
     *
     * @urlParam id required El ID del mensaje a actualizar. Example: 1
     * @bodyParam asunto string El asunto del mensaje. Example: Reunión actualizada
     * @bodyParam contenido string El contenido del mensaje. Example: Contenido actualizado del mensaje
     * @bodyParam usuario_id_emisor integer El ID del usuario que envía el mensaje. Example: 1
     *
     * @response {
     *  "message": "Mensaje actualizado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "asunto": "Reunión actualizada",
     *    "contenido": "Contenido actualizado del mensaje",
     *    "usuario_id_emisor": 1,
     *    "created_at": "2025-06-10T12:00:00Z",
     *    "updated_at": "2025-06-10T12:00:00Z"
     *  }
     * }
     * @response 404 {
     *  "error": "Mensaje no encontrado."
     * }
     * @response 422 {
     *  "error": {
     *    "asunto": ["El campo asunto no puede exceder los 255 caracteres."]
     *  }
     * }
     */
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

    /**
     * Eliminar mensaje
     *
     * Elimina un mensaje específico del sistema.
     *
     * @urlParam id required El ID del mensaje a eliminar. Example: 1
     *
     * @response 200 {
     *  "message": "Mensaje eliminado correctamente."
     * }
     * @response 404 {
     *  "error": "Mensaje no encontrado."
     * }
     * @response 500 {
     *  "error": "Error al eliminar el mensaje.",
     *  "message": "Mensaje de error detallado"
     * }
     */
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
