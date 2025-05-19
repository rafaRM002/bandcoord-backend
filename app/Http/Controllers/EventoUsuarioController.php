<?php

namespace App\Http\Controllers;

use App\Models\EventoUsuario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EventoUsuarioController extends Controller
{
    // Listar todos los eventos de usuarios
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

    // Obtener un evento_usuario específico
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

    // Crear un nuevo evento de usuario
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

    // Actualizar la confirmación de asistencia de un usuario a un evento
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

    // Eliminar un registro evento_usuario
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
