<?php

namespace App\Http\Controllers;

use App\Mail\CorreoPersonalizado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        try {
            $usuarios = Usuario::all();
            return response()->json([
                'message' => 'Usuarios obtenidos correctamente.',
                'data' => $usuarios
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los usuarios.', 'message' => $e->getMessage()], 500);
        }
    }

    // Obtener un usuario específico
    public function show($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            return response()->json([
                'message' => 'Usuario obtenido correctamente.',
                'data' => $usuario
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Usuario no encontrado.', 'message' => $e->getMessage()], 404);
        }
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido1' => 'required|string|max:255',
                'apellido2' => 'nullable|string|max:255',
                'telefono' => 'nullable|string|max:20',
                'email' => 'required|email|unique:usuarios,email',
                'password' => 'required|string|min:6|confirmed',
                'estado' => 'required|string|in:activo,suspendido,bloqueado',
                'fecha_nac' => 'required|date',
                'fecha_entrada' => 'required|date',
                'role' => 'required|string|in:admin,miembro',
            ]);

            // Crear el nuevo usuario
            $usuario = Usuario::create([
                'nombre' => $validated['nombre'],
                'apellido1' => $validated['apellido1'],
                'apellido2' => $validated['apellido2'] ?? null,
                'telefono' => $validated['telefono'] ?? null,
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'estado' => $validated['estado'],
                'fecha_nac' => $validated['fecha_nac'],
                'fecha_entrada' => $validated['fecha_entrada'],
                'role' => $validated['role'],
            ]);

            return response()->json([
                'message' => 'Usuario creado correctamente.',
                'data' => $usuario
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'apellido1' => 'sometimes|required|string|max:255',
                'apellido2' => 'nullable|string|max:255',
                'telefono' => 'nullable|string|max:20',
                'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
                'password' => 'nullable|string|min:6|confirmed',
                'estado' => 'nullable|string|in:activo,suspendido,bloqueado',
                'fecha_nac' => 'nullable|date',
                'fecha_entrada' => 'nullable|date',
                'role' => 'nullable|string|in:admin,miembro',
            ]);

            $usuario = Usuario::findOrFail($id);

            // Guardamos y eliminamos la password del array validado
            $password = $validated['password'] ?? null;
            unset($validated['password']);

            // Rellenamos el resto de atributos
            $usuario->fill($validated);

            // Solo si se proporciona una nueva contraseña, se actualiza
            if (!empty($password)) {
                $usuario->password = bcrypt($password);
            }

            $usuario->save();

            return response()->json([
                'message' => 'Usuario actualizado correctamente.',
                'data' => $usuario
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    // Aprobar un usuario
    public function approveUser($id)
    {
        try {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }

            $usuario->estado = 'activo';
            $usuario->save();

            return response()->json([
                'message' => 'Usuario aprobado correctamente.',
                'data' => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al aprobar al usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    // Bloquear un usuario
    public function blockUser($id)
    {
        try {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }

            if ($usuario->estado === 'bloqueado') {
                return response()->json(['error' => 'Este usuario ya está bloqueado.'], 400);
            }

            $usuario->estado = 'bloqueado';
            $usuario->save();

            return response()->json([
                'message' => 'Usuario bloqueado correctamente.',
                'data' => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al bloquear al usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();

            return response()->json([
                'message' => 'Usuario eliminado correctamente.',
                'data' => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el usuario.', 'message' => $e->getMessage()], 500);
        }
    }

    public function enviarCorreoPersonalizado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mensaje' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Datos inválidos',
                'messages' => $validator->errors()
            ], 422);
        }
        try {
            Mail::to($request->email)->send(new CorreoPersonalizado($request->mensaje));
            return response()->json(['success' => 'Correo enviado correctamente con vista personalizada'], 200);
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al enviar el correo', 'message' => $e->getMessage()], 500);
        }
    }
}
