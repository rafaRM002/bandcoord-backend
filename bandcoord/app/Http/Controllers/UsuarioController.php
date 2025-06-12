<?php

namespace App\Http\Controllers;

use App\Mail\CorreoPersonalizado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @group Gestión de Usuarios
 *
 * APIs para gestionar usuarios en el sistema
 */
class UsuarioController extends Controller
{
    /**
     * Listar usuarios
     *
     * Obtiene una lista de todos los usuarios registrados en el sistema.
     *
     * @response 200 {
     *  "message": "Usuarios obtenidos correctamente.",
     *  "data": [
     *    {
     *      "id": 1,
     *      "nombre": "Juan",
     *      "apellido1": "Pérez",
     *      "apellido2": "García",
     *      "telefono": "123456789",
     *      "email": "juan@ejemplo.com",
     *      "estado": "activo",
     *      "fecha_nac": "1990-01-01",
     *      "fecha_entrada": "2023-01-01",
     *      "role": "miembro"
     *    }
     *  ]
     * }
     * @response 500 {
     *  "error": "Error al obtener los usuarios.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Mostrar usuario
     *
     * Muestra la información de un usuario específico.
     *
     * @urlParam id required El ID del usuario. Example: 1
     *
     * @response 200 {
     *  "message": "Usuario obtenido correctamente.",
     *  "data": {
     *    "id": 1,
     *    "nombre": "Juan",
     *    "apellido1": "Pérez",
     *    "apellido2": "García",
     *    "telefono": "123456789",
     *    "email": "juan@ejemplo.com",
     *    "estado": "activo",
     *    "fecha_nac": "1990-01-01",
     *    "fecha_entrada": "2023-01-01",
     *    "role": "miembro"
     *  }
     * }
     * @response 404 {
     *  "error": "Usuario no encontrado.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Crear usuario
     *
     * Crea un nuevo usuario en el sistema.
     *
     * @bodyParam nombre string required Nombre del usuario. Example: Juan
     * @bodyParam apellido1 string required Primer apellido del usuario. Example: Pérez
     * @bodyParam apellido2 string Segundo apellido del usuario. Example: García
     * @bodyParam telefono string Número de teléfono del usuario. Example: 123456789
     * @bodyParam email string required Email del usuario. Example: juan@ejemplo.com
     * @bodyParam password string required Contraseña del usuario (mínimo 6 caracteres). Example: password123
     * @bodyParam password_confirmation string required Confirmación de la contraseña. Example: password123
     * @bodyParam estado string required Estado del usuario (activo/suspendido/bloqueado). Example: activo
     * @bodyParam fecha_nac date required Fecha de nacimiento. Example: 1990-01-01
     * @bodyParam fecha_entrada date required Fecha de entrada. Example: 2023-01-01
     * @bodyParam role string required Rol del usuario (admin/miembro). Example: miembro
     *
     * @response 201 {
     *  "message": "Usuario creado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "nombre": "Juan",
     *    "apellido1": "Pérez",
     *    "apellido2": "García",
     *    "telefono": "123456789",
     *    "email": "juan@ejemplo.com",
     *    "estado": "activo",
     *    "fecha_nac": "1990-01-01",
     *    "fecha_entrada": "2023-01-01",
     *    "role": "miembro"
     *  }
     * }
     * @response 422 {
     *  "error": {
     *    "email": ["El correo electrónico ya está en uso."]
     *  }
     * }
     */
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

    /**
     * Actualizar usuario
     *
     * Actualiza la información de un usuario existente.
     *
     * @urlParam id required El ID del usuario. Example: 1
     * @bodyParam nombre string Nombre del usuario. Example: Juan
     * @bodyParam apellido1 string Primer apellido del usuario. Example: Pérez
     * @bodyParam apellido2 string Segundo apellido del usuario. Example: García
     * @bodyParam telefono string Número de teléfono del usuario. Example: 123456789
     * @bodyParam email string Email del usuario. Example: juan@ejemplo.com
     * @bodyParam password string Contraseña del usuario (mínimo 6 caracteres). Example: newpassword123
     * @bodyParam password_confirmation string Confirmación de la contraseña. Example: newpassword123
     * @bodyParam estado string Estado del usuario (activo/suspendido/bloqueado). Example: activo
     * @bodyParam fecha_nac date Fecha de nacimiento. Example: 1990-01-01
     * @bodyParam fecha_entrada date Fecha de entrada. Example: 2023-01-01
     * @bodyParam role string Rol del usuario (admin/miembro). Example: miembro
     *
     * @response 200 {
     *  "message": "Usuario actualizado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "nombre": "Juan",
     *    "apellido1": "Pérez",
     *    "apellido2": "García",
     *    "telefono": "123456789",
     *    "email": "juan@ejemplo.com",
     *    "estado": "activo",
     *    "fecha_nac": "1990-01-01",
     *    "fecha_entrada": "2023-01-01",
     *    "role": "miembro"
     *  }
     * }
     */
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

    /**
     * Aprobar usuario
     *
     * Cambia el estado de un usuario a 'activo'.
     *
     * @urlParam id required El ID del usuario. Example: 1
     *
     * @response 200 {
     *  "message": "Usuario aprobado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "estado": "activo"
     *  }
     * }
     * @response 404 {
     *  "error": "Usuario no encontrado."
     * }
     */
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

    /**
     * Bloquear usuario
     *
     * Cambia el estado de un usuario a 'bloqueado'.
     *
     * @urlParam id required El ID del usuario. Example: 1
     *
     * @response 200 {
     *  "message": "Usuario bloqueado correctamente.",
     *  "data": {
     *    "id": 1,
     *    "estado": "bloqueado"
     *  }
     * }
     * @response 400 {
     *  "error": "Este usuario ya está bloqueado."
     * }
     */
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

    /**
     * Suspender usuario
     *
     * Suspende un usuario pendiente. Solo accesible por administradores.
     *
     * @urlParam id required El ID del usuario a suspender. Example: 1
     *
     * @response {
     *     "message": "Usuario suspendido correctamente.",
     *     "usuario": {
     *         "id": 1,
     *         "nombre": "Juan",
     *         "estado": "suspendido",
     *         ...
     *     }
     * }
     * @response 404 {
     *     "error": "Usuario no encontrado"
     * }
     * @response 400 {
     *     "error": "Este al suspender el usuario"
     * }
     */
    public function suspend($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->estado = 'suspendido';
            $usuario->save();

            return response()->json([
                'success' => true,
                'message' => 'Usuario suspendido correctamente',
                'data' => $usuario
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al suspender usuario'
            ], 500);
        }
    }

    /**
     * Eliminar usuario
     *
     * Elimina un usuario del sistema.
     *
     * @urlParam id required El ID del usuario. Example: 1
     *
     * @response 200 {
     *  "message": "Usuario eliminado correctamente.",
     *  "data": {
     *    "id": 1
     *  }
     * }
     * @response 404 {
     *  "error": "Usuario no encontrado."
     * }
     */
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

    /**
     * Enviar correo personalizado
     *
     * Envía un correo electrónico personalizado a un usuario.
     *
     * @bodyParam email string required Email del destinatario. Example: usuario@ejemplo.com
     * @bodyParam mensaje string required Contenido del mensaje (máximo 1000 caracteres). Example: Este es un mensaje personalizado.
     *
     * @response 200 {
     *  "success": "Correo enviado correctamente con vista personalizada"
     * }
     * @response 422 {
     *  "error": "Datos inválidos",
     *  "messages": {
     *    "email": ["El campo email es obligatorio."],
     *    "mensaje": ["El campo mensaje es obligatorio."]
     *  }
     * }
     */
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
