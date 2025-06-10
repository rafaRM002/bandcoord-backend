<?php

namespace App\Http\Controllers;

use App\Models\MensajeUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group Gestión de Mensajes de Usuarios
 *
 * APIs para gestionar mensajes de usuarios en el sistema
 */
class MensajeUsuarioController extends Controller
{
    /**
     * Mostrar lista de todas las relaciones de mensajes de usuarios
     *
     * @group Gestión de Mensajes-Usuario
     *
     * @response 200 {
     *     "message": "Relaciones de mensajes de usuario listadas exitosamente",
     *     "data": [
     *         {
     *             "mensaje_id": 1,
     *             "usuario_id_receptor": 1,
     *             "estado": true,
     *             "created_at": "2025-06-10T10:00:00.000000Z",
     *             "updated_at": "2025-06-10T10:00:00.000000Z"
     *         }
     *     ]
     * }
     * @response 500 {
     *     "error": "Error al listar relaciones de mensajes de usuario.",
     *     "message": "Mensaje de error específico"
     * }
     */
    // Listar todas las relaciones de mensajes de usuarios
    public function index()
    {
        try {
            $mensajeUsuarios = MensajeUsuario::all();
            return response()->json([
                'message' => 'Relaciones de mensajes de usuario listadas exitosamente',
                'data' => $mensajeUsuarios
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al listar relaciones de mensajes de usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener una relación específica de mensaje-usuario
     *
     * @group Gestión de Mensajes-Usuario
     *
     * @urlParam mensaje_id required El ID del mensaje. Example: 1
     * @urlParam usuario_id_receptor required El ID del usuario receptor. Example: 1
     *
     * @response 200 {
     *     "message": "Relación de mensaje de usuario encontrada",
     *     "data": {
     *         "mensaje_id": 1,
     *         "usuario_id_receptor": 1,
     *         "estado": true,
     *         "created_at": "2025-06-10T10:00:00.000000Z",
     *         "updated_at": "2025-06-10T10:00:00.000000Z"
     *     }
     * }
     * @response 404 {
     *     "message": "Relación de mensaje de usuario no encontrada."
     * }
     * @response 500 {
     *     "error": "Error al obtener la relación.",
     *     "message": "Mensaje de error específico"
     * }
     */
    // Obtener una relación de mensaje de usuario
    public function show($mensaje_id, $usuario_id_receptor)
    {
        try {
            $mensajeUsuario = MensajeUsuario::where('mensaje_id', $mensaje_id)
                ->where('usuario_id_receptor', $usuario_id_receptor)
                ->firstOrFail();

            return response()->json([
                'message' => 'Relación de mensaje de usuario encontrada',
                'data' => $mensajeUsuario
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Relación de mensaje de usuario no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la relación.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear una nueva relación mensaje-usuario
     *
     * @group Gestión de Mensajes-Usuario
     *
     * @bodyParam mensaje_id integer required ID del mensaje. Example: 1
     * @bodyParam usuario_id_receptor integer required ID del usuario receptor. Example: 1
     * @bodyParam estado boolean required Estado del mensaje. Example: true
     *
     * @response 201 {
     *     "message": "Relación de mensaje de usuario creada exitosamente",
     *     "data": {
     *         "mensaje_id": 1,
     *         "usuario_id_receptor": 1,
     *         "estado": true,
     *         "created_at": "2025-06-10T10:00:00.000000Z",
     *         "updated_at": "2025-06-10T10:00:00.000000Z"
     *     }
     * }
     * @response 409 {
     *     "message": "Esta relación de mensaje ya existe."
     * }
     * @response 422 {
     *     "error": {
     *         "mensaje_id": ["El campo mensaje_id es obligatorio."],
     *         "usuario_id_receptor": ["El campo usuario_id_receptor es obligatorio."],
     *         "estado": ["El campo estado es obligatorio."]
     *     }
     * }
     * @response 500 {
     *     "error": "Error al crear la relación.",
     *     "message": "Mensaje de error específico"
     * }
     */
    // Crear una nueva relación de mensaje de usuario
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'mensaje_id' => 'required|exists:mensajes,id',
                'usuario_id_receptor' => 'required|exists:usuarios,id',
                'estado' => 'required|boolean',
            ]);

            $existing = MensajeUsuario::where('mensaje_id', $validated['mensaje_id'])
                ->where('usuario_id_receptor', $validated['usuario_id_receptor'])
                ->first();

            if ($existing) {
                return response()->json(['message' => 'Esta relación de mensaje ya existe.'], 409);
            }

            $mensajeUsuario = MensajeUsuario::create($validated);

            return response()->json([
                'message' => 'Relación de mensaje de usuario creada exitosamente',
                'data' => $mensajeUsuario
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la relación.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar el estado de una relación mensaje-usuario
     *
     * @group Gestión de Mensajes-Usuario
     *
     * @urlParam mensaje_id required El ID del mensaje. Example: 1
     * @urlParam usuario_id_receptor required El ID del usuario receptor. Example: 1
     * @bodyParam estado boolean required Nuevo estado del mensaje. Example: true
     *
     * @response 200 {
     *     "message": "Estado actualizado correctamente."
     * }
     * @response 404 {
     *     "message": "No se encontró la relación."
     * }
     * @response 422 {
     *     "error": {
     *         "estado": ["El campo estado es obligatorio."]
     *     }
     * }
     * @response 500 {
     *     "error": "Error al actualizar el estado.",
     *     "message": "Mensaje de error específico"
     * }
     */
    // Actualizar el estado de una relación de mensaje de usuario
    public function update(Request $request, $mensaje_id, $usuario_id_receptor)
    {
        try {
            $validated = $request->validate([
                'estado' => 'required|boolean',
            ]);

            $registro = DB::table('mensaje_usuario')
                ->where('mensaje_id', $mensaje_id)
                ->where('usuario_id_receptor', $usuario_id_receptor)
                ->first();

            if (!$registro) {
                return response()->json(['message' => 'No se encontró la relación.'], 404);
            }

            if ($registro->estado == $validated['estado']) {
                return response()->json(['message' => 'El estado ya tiene ese valor. No se realizaron cambios.']);
            }

            DB::table('mensaje_usuario')
                ->where('mensaje_id', $mensaje_id)
                ->where('usuario_id_receptor', $usuario_id_receptor)
                ->update(['estado' => $validated['estado']]);

            return response()->json(['message' => 'Estado actualizado correctamente.']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el estado.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Eliminar una relación mensaje-usuario
     *
     * @group Gestión de Mensajes-Usuario
     *
     * @urlParam mensaje_id required El ID del mensaje a eliminar. Example: 1
     * @urlParam usuario_id required El ID del usuario receptor. Example: 1
     *
     * @response 200 {
     *     "message": "Registro eliminado correctamente."
     * }
     * @response 404 {
     *     "message": "No se encontró el registro para eliminar."
     * }
     * @response 500 {
     *     "error": "Error al eliminar el registro.",
     *     "message": "Mensaje de error específico"
     * }
     */
    // Eliminar un registro de la tabla mensaje_usuario
    public function destroy($mensaje_id, $usuario_id)
    {
        try {
            $deleted = DB::table('mensaje_usuario')
                ->where('mensaje_id', $mensaje_id)
                ->where('usuario_id_receptor', $usuario_id)
                ->delete();

            if ($deleted) {
                return response()->json(['message' => 'Registro eliminado correctamente.']);
            } else {
                return response()->json(['message' => 'No se encontró el registro para eliminar.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el registro.', 'message' => $e->getMessage()], 500);
        }
    }
}
