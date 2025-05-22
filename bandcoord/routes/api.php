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

// RUTAS PÚBLICAS
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/mailTo', [UsuarioController::class, 'enviarCorreoPersonalizado']);;

// RUTAS PROTEGIDAS
Route::middleware('auth:sanctum')->group(function () {

    // CERRAR SESIÓN
    Route::post('/logout', [AuthController::class, 'logout']);

    // USUARIOS
    Route::middleware('isAdmin')->group(function () {
        Route::get('usuarios', [UsuarioController::class, 'index']); //Listar todos los usuaarios
        Route::get('usuarios/{id}', [UsuarioController::class, 'show']); //Mostrar usuario concreto
        Route::put('usuarios/{id}', [UsuarioController::class, 'update']); //Modificar usuario concreto
        Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']); //Eliminar usuario concreto
        Route::patch('usuarios/{id}/approve', [UsuarioController::class, 'approveUser']); //Activar un usuario
        Route::patch('usuarios/{id}/block', [UsuarioController::class, 'blockUser']); //Bloquear un usuario
    });
    // Obtener el usuario autenticado
    Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
        return $request->user();
    });

    // INSTRUMENTOS
    Route::apiResource('instrumentos', InstrumentoController::class)->middleware('isAdmin');
    Route::apiResource('tipo-instrumentos', TipoInstrumentoController::class)->middleware('isAdmin');

    // EVENTOS
    Route::apiResource('eventos', EventoController::class)->middleware('isAdmin');

    Route::middleware('isAdmin')->group(function () {
        Route::get('minimos-evento', [MinimoEventoController::class, 'index']);
        Route::post('minimos-evento', [MinimoEventoController::class, 'store']);
        Route::get('minimos-evento/{evento_id}/{instrumento_tipo_id}', [MinimoEventoController::class, 'show']);
        Route::put('minimos-evento/{evento_id}/{instrumento_tipo_id}', [MinimoEventoController::class, 'update']);
        Route::delete('minimos-evento/{evento_id}/{instrumento_tipo_id}', [MinimoEventoController::class, 'destroy']);
    });

    Route::get('evento-usuario', [EventoUsuarioController::class, 'index']);
    Route::post('evento-usuario', [EventoUsuarioController::class, 'store']);
    Route::get('evento-usuario/{evento_id}/{usuario_id}', [EventoUsuarioController::class, 'show']);
    Route::put('evento-usuario/{evento_id}/{usuario_id}', [EventoUsuarioController::class, 'update']);
    Route::delete('evento-usuario/{evento_id}/{usuario_id}', [EventoUsuarioController::class, 'destroy']);

    // PRESTAMOS
    Route::middleware('isAdmin')->group(function () {
        Route::get('prestamos', [PrestamoInstrumentoController::class, 'index']);
        Route::post('prestamos', [PrestamoInstrumentoController::class, 'store']);
        Route::get('prestamos/{num_serie}/{usuario_id}', [PrestamoInstrumentoController::class, 'show']);
        Route::put('prestamos/{num_serie}/{usuario_id}', [PrestamoInstrumentoController::class, 'update']);
        Route::delete('prestamos/{num_serie}/{usuario_id}', [PrestamoInstrumentoController::class, 'destroy']);
    });

    // ENTIDADES
    Route::apiResource('entidades', EntidadController::class)->middleware('isAdmin');

    // COMPOSICIONES
    Route::apiResource('composiciones', ComposicionController::class)->middleware('isAdmin');

    Route::get('composicion-usuario', [ComposicionUsuarioController::class, 'index']);
    Route::post('composicion-usuario', [ComposicionUsuarioController::class, 'store']);
    Route::get('composicion-usuario/{composicion_id}/{usuario_id}', [ComposicionUsuarioController::class, 'show']);
    Route::delete('composicion-usuario/{composicion_id}/{usuario_id}', [ComposicionUsuarioController::class, 'destroy']);

    // MENSAJES
    Route::apiResource('mensajes', MensajeController::class);

    Route::get('mensaje-usuarios', [MensajeUsuarioController::class, 'index']);
    Route::get('mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}', [MensajeUsuarioController::class, 'show']);
    Route::post('mensaje-usuarios', [MensajeUsuarioController::class, 'store']);
    Route::put('mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}', [MensajeUsuarioController::class, 'update']);
    Route::delete('mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}', [MensajeUsuarioController::class, 'destroy']);
});
