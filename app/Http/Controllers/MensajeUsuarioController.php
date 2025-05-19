<?php

namespace App\Http\Controllers;

use App\Models\MensajeUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MensajeUsuarioController extends Controller
{
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

    // Actualizar el estado de una relación de mensaje de usuario
    public function update(Request $request, $mensaje_id, $usuario_id_receptor)
    {
        try {
            $validated = $request->validate([
                'estado' => 'required|boolean',
            ]);

            $mensajeUsuario = MensajeUsuario::where('mensaje_id', $mensaje_id)
                ->where('usuario_id_receptor', $usuario_id_receptor)
                ->firstOrFail();

            $mensajeUsuario->update($validated);

            return response()->json([
                'message' => 'Relación de mensaje de usuario actualizada exitosamente',
                'data' => $mensajeUsuario
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Relación de mensaje de usuario no encontrada para actualizar.'], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la relación.', 'message' => $e->getMessage()], 500);
        }
    }

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
