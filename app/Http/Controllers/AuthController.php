<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Registro de un nuevo usuario
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'apellido1' => 'required|string|max:255',
                'apellido2' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:usuarios,email',
                'telefono' => 'nullable|string|max:15',
                'password' => 'required|string|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'password' => Hash::make($request->password),
                'estado' => 'pendiente',
                'fecha_entrada' => now(),
                'role' => 'miembro',
            ]);

            return response()->json([
                'message' => 'Usuario registrado correctamente. Esperando aprobación del administrador.',
                'usuario' => $usuario
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al registrar el usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Función para iniciar sesión
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = Usuario::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'message' => 'El usuario no existe.',
                ], 404);
            }

            if ($user->estado === 'pendiente') {
                return response()->json([
                    'message' => 'Tu cuenta está pendiente de aprobación por un administrador.'
                ], 401);
            }

            if (!Hash::check(trim($request->password), $user->password)) {
                return response()->json([
                    'message' => 'Las credenciales son incorrectas.',
                ], 401);
            }

            return response()->json([
                'token' => $user->createToken('api-token')->plainTextToken,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al iniciar sesión.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Aprobar usuario
    public function aprobarUsuario($id)
    {
        try {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            if ($usuario->estado !== 'pendiente') {
                return response()->json(['error' => 'Este usuario no está pendiente de aprobación.'], 400);
            }

            $usuario->estado = 'activo';
            $usuario->save();

            return response()->json([
                'message' => 'Usuario aprobado correctamente.',
                'usuario' => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al aprobar el usuario.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Perfil del usuario
    public function profile(Request $request)
    {
        try {
            return response()->json($request->user());
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener el perfil.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Sesión cerrada correctamente']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al cerrar la sesión.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
