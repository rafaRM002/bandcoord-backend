<?php

namespace App\Http\Controllers;

use App\Models\ComposicionUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group Gestión de Composiciones de Usuario
 *
 * APIs para gestionar las relaciones entre composiciones y usuarios
 */
class ComposicionUsuarioController extends Controller
{
    /**
     * Listar todas las composiciones-usuario
     *
     * Obtiene un listado de todas las relaciones entre composiciones y usuarios.
     *
     * @response 200 {
     *  "data": [
     *    {
     *      "composicion_id": 1,
     *      "usuario_id": 1,
     *      "created_at": "2025-06-10T12:00:00.000000Z",
     *      "updated_at": "2025-06-10T12:00:00.000000Z"
     *    }
     *  ]
     * }
     * @response 500 {
     *  "error": "Hubo un problema al obtener las composiciones de usuario.",
     *  "message": "Error message"
     * }
     */
    public function index()
    {
        try {
            $composicionesUsuarios = ComposicionUsuario::all();
            return response()->json($composicionesUsuarios, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener las composiciones de usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener una composición-usuario específica
     *
     * Recupera la información de una relación específica entre composición y usuario.
     *
     * @urlParam composicion_id integer required ID de la composición. Example: 1
     * @urlParam usuario_id integer required ID del usuario. Example: 1
     *
     * @response 200 {
     *  "composicion_id": 1,
     *  "usuario_id": 1,
     *  "created_at": "2025-06-10T12:00:00.000000Z",
     *  "updated_at": "2025-06-10T12:00:00.000000Z"
     * }
     * @response 404 {
     *  "error": "Composición de usuario no encontrada.",
     *  "message": "No se encontró una relación entre composición y usuario con esos IDs."
     * }
     * @response 500 {
     *  "error": "Hubo un problema al obtener la composición de usuario.",
     *  "message": "Error message"
     * }
     */
    public function show($composicion_id, $usuario_id)
    {
        try {
            $composicionUsuario = ComposicionUsuario::where('composicion_id', $composicion_id)
                ->where('usuario_id', $usuario_id)
                ->first();

            if (!$composicionUsuario) {
                return response()->json([
                    'error' => 'Composición de usuario no encontrada.',
                    'message' => 'No se encontró una relación entre composición y usuario con esos IDs.'
                ], 404);
            }

            return response()->json($composicionUsuario, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener la composición de usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Crear una nueva composición-usuario
     *
     * Crea una nueva relación entre una composición y un usuario.
     *
     * @bodyParam composicion_id integer required ID de la composición. Example: 1
     * @bodyParam usuario_id integer required ID del usuario. Example: 1
     *
     * @response 201 {
     *  "message": "Composición de usuario creada exitosamente.",
     *  "data": {
     *    "composicion_id": 1,
     *    "usuario_id": 1,
     *    "created_at": "2025-06-10T12:00:00.000000Z",
     *    "updated_at": "2025-06-10T12:00:00.000000Z"
     *  }
     * }
     * @response 409 {
     *  "message": "Esta composición de usuario ya existe."
     * }
     * @response 500 {
     *  "error": "Hubo un problema al crear la composición de usuario.",
     *  "message": "Error message"
     * }
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'composicion_id' => 'required|exists:composiciones,id',
                'usuario_id' => 'required|exists:usuarios,id',
            ]);

            $existing = ComposicionUsuario::where('composicion_id', $validated['composicion_id'])
                ->where('usuario_id', $validated['usuario_id'])
                ->first();

            if ($existing) {
                return response()->json([
                    'message' => 'Esta composición de usuario ya existe.'
                ], 409);
            }

            $composicionUsuario = ComposicionUsuario::create($validated);

            return response()->json([
                'message' => 'Composición de usuario creada exitosamente.',
                'data' => $composicionUsuario
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al crear la composición de usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar una composición-usuario
     *
     * Este endpoint no está implementado ya que no hay datos actualizables.
     *
     * @urlParam composicion_id integer required ID de la composición. Example: 1
     * @urlParam usuario_id integer required ID del usuario. Example: 1
     *
     * @response 501 {
     *  "message": "Este método no está implementado porque no hay datos actualizables."
     * }
     */
    public function update(Request $request, $composicion_id, $usuario_id)
    {
        // No implementado
        return response()->json([
            'message' => 'Este método no está implementado porque no hay datos actualizables.'
        ], 501); // 501 Not Implemented
    }

    /**
     * Eliminar una composición-usuario
     *
     * Elimina una relación existente entre una composición y un usuario.
     *
     * @urlParam composicion_id integer required ID de la composición. Example: 1
     * @urlParam usuario_id integer required ID del usuario. Example: 1
     *
     * @response 200 {
     *  "message": "Registro eliminado correctamente."
     * }
     * @response 404 {
     *  "message": "No se encontró el registro para eliminar."
     * }
     * @response 500 {
     *  "error": "Hubo un problema al eliminar la composición de usuario.",
     *  "message": "Error message"
     * }
     */
    public function destroy($composicion_id, $usuario_id)
    {
        try {
            $deleted = DB::table('composicion_usuario')
                ->where('composicion_id', $composicion_id)
                ->where('usuario_id', $usuario_id)
                ->delete();

            if ($deleted) {
                return response()->json([
                    'message' => 'Registro eliminado correctamente.'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'No se encontró el registro para eliminar.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al eliminar la composición de usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
