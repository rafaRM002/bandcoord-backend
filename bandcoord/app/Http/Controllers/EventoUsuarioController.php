<?php

namespace App\Http\Controllers;

use App\Models\EventoUsuario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

/**
 * @group Gestión de Eventos por Usuario
 *
 * APIs para gestionar la relación entre eventos y usuarios
 */
class EventoUsuarioController extends Controller
{
    /**
     * Listar eventos por usuario
     *
     * Obtiene un listado de todas las relaciones entre eventos y usuarios.
     *
     * @response status=200 scenario="Éxito" {
     *   "message": "Listado de eventos por usuario obtenido correctamente.",
     *   "data": [
     *     {
     *       "evento_id": 1,
     *       "usuario_id": 1,
     *       "confirmacion": true,
     *       "created_at": "2025-06-10T12:00:00.000000Z",
     *       "updated_at": "2025-06-10T12:00:00.000000Z"
     *     }
     *   ]
     * }
     * @response status=500 scenario="Error" {
     *   "error": "Error al obtener los eventos de usuarios.",
     *   "message": "Mensaje de error específico"
     * }
     */
    public function index()
    {
        try {
            return response()->json([
                'message' => 'Listado de eventos por usuario obtenido correctamente.',
                'data' => EventoUsuario::all()
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los eventos de usuarios.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Mostrar evento por usuario específico
     *
     * Obtiene los detalles de un registro específico de evento-usuario incluyendo la información relacionada.
     *
     * @urlParam evento_id required El ID del evento. Example: 1
     * @urlParam usuario_id required El ID del usuario. Example: 1
     *
     * @response status=200 scenario="Éxito" {
     *   "message": "Evento usuario obtenido correctamente.",
     *   "data": {
     *     "evento_id": 1,
     *     "usuario_id": 1,
     *     "confirmacion": true,
     *     "created_at": "2025-06-10T12:00:00.000000Z",
     *     "updated_at": "2025-06-10T12:00:00.000000Z",
     *     "evento": {
     *       "id": 1,
     *       "nombre": "Ensayo General",
     *       "descripcion": "Ensayo general de la banda"
     *     },
     *     "usuario": {
     *       "id": 1,
     *       "nombre": "Juan Pérez",
     *       "email": "juan@ejemplo.com"
     *     }
     *   }
     * }
     * @response status=404 scenario="No encontrado" {
     *   "error": "Evento usuario no encontrado."
     * }
     */
    public function show($evento_id, $usuario_id)
    {
        try {
            $eventuser = EventoUsuario::with('evento', 'usuario')
                ->where('evento_id', $evento_id)
                ->where('usuario_id', $usuario_id)
                ->firstOrFail();

            return response()->json([
                'message' => 'Evento usuario obtenido correctamente.',
                'data' => $eventuser
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Evento usuario no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener el evento usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear evento por usuario
     *
     * Registra un nuevo evento-usuario en el sistema.
     *
     * @bodyParam evento_id integer required ID del evento. Example: 1
     * @bodyParam usuario_id integer required ID del usuario. Example: 1
     * @bodyParam confirmacion boolean optional Estado de confirmación del usuario. Example: true
     *
     * @response status=201 scenario="Creado" {
     *   "message": "Evento de usuario creado correctamente.",
     *   "data": {
     *     "evento_id": 1,
     *     "usuario_id": 1,
     *     "confirmacion": true,
     *     "created_at": "2025-06-10T12:00:00.000000Z",
     *     "updated_at": "2025-06-10T12:00:00.000000Z"
     *   }
     * }
     * @response status=400 scenario="Usuario ya registrado" {
     *   "error": "El usuario ya está registrado para este evento."
     * }
     * @response status=422 scenario="Error de validación" {
     *   "error": {
     *     "evento_id": ["El evento_id es requerido."],
     *     "usuario_id": ["El usuario_id es requerido."]
     *   }
     * }
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'evento_id' => 'required|exists:eventos,id',
                'usuario_id' => 'required|exists:usuarios,id',
                'confirmacion' => 'nullable|boolean',
            ]);

            $existingRecord = EventoUsuario::where('evento_id', $validated['evento_id'])
                ->where('usuario_id', $validated['usuario_id'])
                ->first();

            if ($existingRecord) {
                return response()->json(['error' => 'El usuario ya está registrado para este evento.'], 400);
            }

            $registro = EventoUsuario::create($validated);

            return response()->json([
                'message' => 'Evento de usuario creado correctamente.',
                'data' => $registro
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el evento usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Actualizar confirmación
     *
     * Actualiza el estado de confirmación de un usuario para un evento específico.
     *
     * @urlParam evento_id required ID del evento. Example: 1
     * @urlParam usuario_id required ID del usuario. Example: 1
     * @bodyParam confirmacion boolean required Nuevo estado de confirmación. Example: true
     *
     * @response status=200 scenario="Éxito" {
     *   "message": "Confirmación actualizada correctamente."
     * }
     * @response status=404 scenario="No encontrado" {
     *   "message": "No se encontró el registro para actualizar."
     * }
     * @response status=422 scenario="Error de validación" {
     *   "error": {
     *     "confirmacion": ["El campo confirmacion es requerido."]
     *   }
     * }
     */
    public function update(Request $request, $evento_id, $usuario_id)
    {
        try {
            $validated = $request->validate([
                'confirmacion' => 'required|boolean',
            ]);

            $registro = DB::table('evento_usuario')
                ->where('evento_id', $evento_id)
                ->where('usuario_id', $usuario_id)
                ->first();

            if (!$registro) {
                return response()->json(['message' => 'No se encontró el registro para actualizar.'], 404);
            }

            if ($registro->confirmacion == $validated['confirmacion']) {
                return response()->json(['message' => 'La confirmación ya tiene ese valor. No se realizaron cambios.']);
            }

            DB::table('evento_usuario')
                ->where('evento_id', $evento_id)
                ->where('usuario_id', $usuario_id)
                ->update(['confirmacion' => $validated['confirmacion']]);

            return response()->json(['message' => 'Confirmación actualizada correctamente.']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la confirmación.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Eliminar evento por usuario
     *
     * Elimina un registro de evento-usuario específico.
     *
     * @urlParam evento_id required ID del evento. Example: 1
     * @urlParam usuario_id required ID del usuario. Example: 1
     *
     * @response status=200 scenario="Éxito" {
     *   "message": "Registro eliminado correctamente."
     * }
     * @response status=404 scenario="No encontrado" {
     *   "message": "No se encontró el registro para eliminar."
     * }
     */
    public function destroy($evento_id, $usuario_id)
    {
        try {
            $deleted = DB::table('evento_usuario')
                ->where('evento_id', $evento_id)
                ->where('usuario_id', $usuario_id)
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
