<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Gestión de Autenticación
 *
 * APIs para gestionar la autenticación de usuarios, registro y gestión de perfiles
 */
class AuthController extends Controller
{
    /**
     * Registrar nuevo usuario
     *
     * Registra un nuevo usuario en el sistema.
     *
     * @bodyParam nombre string required Nombre del usuario. Example: Juan
     * @bodyParam apellido1 string required Primer apellido del usuario. Example: García
     * @bodyParam apellido2 string opcional Segundo apellido del usuario. Example: López
     * @bodyParam email string required Correo electrónico del usuario. Example: juan.garcia@ejemplo.com
     * @bodyParam telefono string opcional Número de teléfono del usuario. Example: 612345678
     * @bodyParam password string required Contraseña del usuario (mínimo 8 caracteres). Example: password123
     * @bodyParam fecha_nac date opcional Fecha de nacimiento del usuario. Example: 1990-01-01
     *
     * @response 201 {
     *     "message": "Usuario registrado correctamente. Esperando aprobación del administrador.",
     *     "usuario": {
     *         "nombre": "Juan",
     *         "apellido1": "García",
     *         "email": "juan.garcia@ejemplo.com",
     *         "estado": "pendiente",
     *         "role": "miembro",
     *         "updated_at": "2025-06-10T12:00:00.000000Z",
     *         "created_at": "2025-06-10T12:00:00.000000Z",
     *         "id": 1
     *     }
     * }
     * @response 422 {
     *     "errors": {
     *         "email": ["El correo electrónico ya está en uso."],
     *         "password": ["La contraseña debe tener al menos 8 caracteres."]
     *     }
     * }
     */
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
                'fecha_nac' =>'nullable|date',
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
                'fecha_nac'=>$request->fecha_nac,
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

    /**
     * Iniciar sesión
     *
     * Autentifica al usuario y devuelve un token de acceso.
     *
     * @bodyParam email string required Correo electrónico del usuario. Example: juan.garcia@ejemplo.com
     * @bodyParam password string required Contraseña del usuario. Example: password123
     *
     * @response {
     *     "token": "1|abcdef123456..."
     * }
     * @response 401 {
     *     "message": "Las credenciales son incorrectas."
     * }
     * @response 401 {
     *     "message": "Tu cuenta está pendiente de aprobación por un administrador."
     * }
     * @response 404 {
     *     "message": "El usuario no existe."
     * }
     */
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

    /**
     * Aprobar usuario
     *
     * Aprueba un usuario pendiente. Solo accesible por administradores.
     *
     * @urlParam id required El ID del usuario a aprobar. Example: 1
     *
     * @response {
     *     "message": "Usuario aprobado correctamente.",
     *     "usuario": {
     *         "id": 1,
     *         "nombre": "Juan",
     *         "estado": "activo",
     *         ...
     *     }
     * }
     * @response 404 {
     *     "error": "Usuario no encontrado"
     * }
     * @response 400 {
     *     "error": "Este usuario no está pendiente de aprobación."
     * }
     */
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

    /**
     * Obtener perfil
     *
     * Obtiene la información del perfil del usuario autenticado.
     *
     * @authenticated
     *
     * @response {
     *     "id": 1,
     *     "nombre": "Juan",
     *     "apellido1": "García",
     *     "email": "juan.garcia@ejemplo.com",
     *     "estado": "activo",
     *     "role": "miembro"
     * }
     */
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

    /**
     * Cerrar sesión
     *
     * Cierra la sesión del usuario actual invalidando el token.
     *
     * @authenticated
     *
     * @response {
     *     "message": "Sesión cerrada correctamente"
     * }
     */
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
