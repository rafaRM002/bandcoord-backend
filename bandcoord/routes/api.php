<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComposicionController;
use App\Http\Controllers\ComposicionUsuarioController;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventoUsuarioController;
use App\Http\Controllers\InstrumentoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\MensajeUsuarioController;
use App\Http\Controllers\MinimoEventoController;
use App\Http\Controllers\PrestamoInstrumentoController;
use App\Http\Controllers\TipoInstrumentoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * @group Autenticación
 * Endpoints para registro y autenticación de usuarios
 */
// RUTAS PÚBLICAS
Route::post('/register', [AuthController::class, 'register']); // @description Registra un nuevo usuario
Route::post('/login', [AuthController::class, 'login']); // @description Inicia sesión de usuario
Route::post('/mailTo', [UsuarioController::class, 'enviarCorreoPersonalizado']); // @description Envía un correo personalizado

// RUTAS PROTEGIDAS
Route::middleware('auth:sanctum')->group(function () {

    /**
     * @group Autenticación
     */
    Route::post('/logout', [AuthController::class, 'logout']); // @description Cierra la sesión del usuario

    /**
     * @group Gestión de Usuarios
     * @middleware isAdmin
     */
    Route::middleware('isAdmin')->group(function () {
        Route::get('usuarios', [UsuarioController::class, 'index']); // @description Lista todos los usuarios
        Route::get('usuarios/{id}', [UsuarioController::class, 'show']); // @description Muestra un usuario específico
        Route::put('usuarios/{id}', [UsuarioController::class, 'update']); // @description Actualiza un usuario específico
        Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']); // @description Elimina un usuario específico
        Route::patch('usuarios/{id}/approve', [UsuarioController::class, 'approveUser']); // @description Activa un usuario
        Route::patch('usuarios/{id}/block', [UsuarioController::class, 'blockUser']); // @description Bloquea un usuario
    });

    /**
     * @group Perfil de Usuario
     */
    Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
        return $request->user();
    }); // @description Obtiene el perfil del usuario autenticado

    /**
     * @group Gestión de Instrumentos
     * @middleware isAdmin
     */
    Route::apiResource('instrumentos', InstrumentoController::class)->middleware('isAdmin');
    Route::apiResource('tipo-instrumentos', TipoInstrumentoController::class)->middleware('isAdmin');

    /**
     * @group Gestión de Eventos
     * @middleware isAdmin
     */
    Route::apiResource('eventos', EventoController::class)->middleware('isAdmin');

    /**
     * @group Gestión de Mínimos de Evento
     * @middleware isAdmin
     */
    Route::middleware('isAdmin')->group(function () {
        Route::get('minimos-evento', [MinimoEventoController::class, 'index']); // @description Lista todos los mínimos de evento
        Route::post('minimos-evento', [MinimoEventoController::class, 'store']); // @description Crea un nuevo mínimo de evento
        Route::get('minimos-evento/{evento_id}/{instrumento_tipo_id}', [MinimoEventoController::class, 'show']); // @description Muestra un mínimo de evento específico
        Route::put('minimos-evento/{evento_id}/{instrumento_tipo_id}', [MinimoEventoController::class, 'update']); // @description Actualiza un mínimo de evento
        Route::delete('minimos-evento/{evento_id}/{instrumento_tipo_id}', [MinimoEventoController::class, 'destroy']); // @description Elimina un mínimo de evento
    });

    /**
     * @group Gestión de Usuarios en Eventos
     */
    Route::get('evento-usuario', [EventoUsuarioController::class, 'index']); // @description Lista todas las asignaciones de usuarios a eventos
    Route::post('evento-usuario', [EventoUsuarioController::class, 'store']); // @description Asigna un usuario a un evento
    Route::get('evento-usuario/{evento_id}/{usuario_id}', [EventoUsuarioController::class, 'show']); // @description Muestra una asignación específica
    Route::put('evento-usuario/{evento_id}/{usuario_id}', [EventoUsuarioController::class, 'update']); // @description Actualiza una asignación
    Route::delete('evento-usuario/{evento_id}/{usuario_id}', [EventoUsuarioController::class, 'destroy']); // @description Elimina una asignación

    /**
     * @group Gestión de Préstamos
     * @middleware isAdmin
     */
    Route::middleware('isAdmin')->group(function () {
        Route::get('prestamos', [PrestamoInstrumentoController::class, 'index']); // @description Lista todos los préstamos
        Route::post('prestamos', [PrestamoInstrumentoController::class, 'store']); // @description Crea un nuevo préstamo
        Route::get('prestamos/{num_serie}/{usuario_id}', [PrestamoInstrumentoController::class, 'show']); // @description Muestra un préstamo específico
        Route::put('prestamos/{num_serie}/{usuario_id}', [PrestamoInstrumentoController::class, 'update']); // @description Actualiza un préstamo
        Route::delete('prestamos/{num_serie}/{usuario_id}', [PrestamoInstrumentoController::class, 'destroy']); // @description Elimina un préstamo
    });

    /**
     * @group Gestión de Entidades
     * @middleware isAdmin
     */
    Route::apiResource('entidades', EntidadController::class)->middleware('isAdmin');

    /**
     * @group Gestión de Composiciones
     * @middleware isAdmin
     */
    Route::apiResource('composiciones', ComposicionController::class)->middleware('isAdmin');

    /**
     * @group Gestión de Usuarios en Composiciones
     */
    Route::get('composicion-usuario', [ComposicionUsuarioController::class, 'index']); // @description Lista todas las asignaciones de usuarios a composiciones
    Route::post('composicion-usuario', [ComposicionUsuarioController::class, 'store']);
    Route::get('composicion-usuario/{composicion_id}/{usuario_id}', [ComposicionUsuarioController::class, 'show']);
    Route::delete('composicion-usuario/{composicion_id}/{usuario_id}', [ComposicionUsuarioController::class, 'destroy']);

    /**
     * @group Gestión de Mensajes
     */
    Route::apiResource('mensajes', MensajeController::class);

    /**
     * @group Gestión de Mensajes a Usuarios
     */
    Route::get('mensaje-usuarios', [MensajeUsuarioController::class, 'index']);
    Route::get('mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}', [MensajeUsuarioController::class, 'show']);
    Route::post('mensaje-usuarios', [MensajeUsuarioController::class, 'store']);
    Route::put('mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}', [MensajeUsuarioController::class, 'update']);
    Route::delete('mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}', [MensajeUsuarioController::class, 'destroy']);
});
