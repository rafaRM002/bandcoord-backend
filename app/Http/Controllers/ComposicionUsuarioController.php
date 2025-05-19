<?php

namespace App\Http\Controllers;

use App\Models\ComposicionUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ComposicionUsuarioController extends Controller
{
    // Listar todas las composiciones-usuario
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

    // Obtener una composicion-usuario
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

    // Crear una nueva composicion-usuario
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

    // Actualizar una composicion-usuario existente
    public function update(Request $request, $composicion_id, $usuario_id)
    {
        // No implementado
        return response()->json([
            'message' => 'Este método no está implementado porque no hay datos actualizables.'
        ], 501); // 501 Not Implemented
    }

    // Eliminar una composicion_usuario
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
