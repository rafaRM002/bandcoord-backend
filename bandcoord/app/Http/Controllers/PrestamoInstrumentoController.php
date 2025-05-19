<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use App\Models\PrestamoInstrumento;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PrestamoInstrumentoController extends Controller
{
    // Listar todos los préstamos de instrumentos
    public function index()
    {
        try {
            $prestamos = PrestamoInstrumento::with('instrumento', 'usuario')->get();
            return response()->json([
                'message' => 'Listado de préstamos obtenido correctamente.',
                'data' => $prestamos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener los préstamos.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener un préstamo específico
    public function show($num_serie, $usuario_id)
    {
        try {
            $prestamo = PrestamoInstrumento::with('instrumento', 'usuario') // Incluir los datos relacionados
            ->where('num_serie', $num_serie)   // Filtrar por num_serie
            ->where('usuario_id', $usuario_id) // Filtrar por usuario_id
            ->firstOrFail();  // Si no existe, arroja un error 404

            return response()->json([
                'message' => 'Préstamo obtenido correctamente.',
                'data' => $prestamo
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Préstamo no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener el préstamo.', 'message' => $e->getMessage()], 500);
        }
    }

    // Crear un nuevo préstamo de instrumento
    public function store(Request $request)
    {
        try {
            // Validación de los datos
            $validated = $request->validate([
                'num_serie' => 'required|exists:instrumentos,numero_serie',
                'usuario_id' => 'required|exists:usuarios,id',
                'fecha_prestamo' => 'required|date',
                'fecha_devolucion' => 'nullable|date',  // fecha_devolucion opcional
            ]);

            // Verificar si el instrumento está disponible
            $instrumento = Instrumento::where('numero_serie', $validated['num_serie'])->first();

            if (!$instrumento) {
                return response()->json(['error' => 'Instrumento no encontrado.'], 404);
            }

            if ($instrumento->estado !== 'disponible') {
                return response()->json(['error' => 'El instrumento no está disponible para préstamo.'], 400);
            }

            // Comprobar si el usuario ya tiene un préstamo activo con el mismo instrumento
            $existingRecord = PrestamoInstrumento::where('usuario_id', $validated['usuario_id'])
                ->where('num_serie', $validated['num_serie'])
                ->whereNull('fecha_devolucion')  // Verifica si no ha sido devuelto
                ->first();

            if ($existingRecord) {
                return response()->json(['error' => 'Este usuario ya tiene un préstamo activo para este instrumento.'], 400);
            }

            // Crea el préstamo
            $prestamo = PrestamoInstrumento::create([
                'num_serie' => $validated['num_serie'],
                'usuario_id' => $validated['usuario_id'],
                'fecha_prestamo' => $validated['fecha_prestamo'],
                //Asignar null si no la añadimos
                'fecha_devolucion' => $validated['fecha_devolucion'] ?? null,
            ]);

            // Marcar el instrumento como "prestado"
            $instrumento->estado = 'prestado';
            $instrumento->save();

            return response()->json([
                'message' => 'Préstamo creado correctamente.',
                'data' => $prestamo
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el préstamo.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Actualizar un préstamo de instrumento
    public function update(Request $request, $num_serie, $usuario_id)
    {
        try {
            // Validamos las fechas
            $validated = $request->validate([
                'fecha_prestamo' => 'required|date',
                'fecha_devolucion' => 'required|date',
            ]);

            // Buscamos el préstamo en la tabla 'prestamo_instrumentos' usando la clave compuesta
            $prestamo = DB::table('prestamo_instrumentos')
                ->where('num_serie', $num_serie)
                ->where('usuario_id', $usuario_id)
                ->first();

            // Si no existe el registro, devolvemos un error 404 con un mensaje
            if (!$prestamo) {
                return response()->json(['message' => 'No se encontró el préstamo para actualizar.'], 404);
            }

            // Si las fechas son iguales, no se hace nada
            if ($prestamo->fecha_prestamo == $validated['fecha_prestamo'] && $prestamo->fecha_devolucion == $validated['fecha_devolucion']) {
                return response()->json(['message' => 'Las fechas ya tienen esos valores. No se realizaron cambios.']);
            }

            // Actualizamos las fechas (solo las fechas)
            DB::table('prestamo_instrumentos')
                ->where('num_serie', $num_serie)
                ->where('usuario_id', $usuario_id)
                ->update([
                    'fecha_prestamo' => $validated['fecha_prestamo'],
                    'fecha_devolucion' => $validated['fecha_devolucion'],
                ]);

            return response()->json(['message' => 'Préstamo actualizado correctamente.']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el préstamo.', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar un préstamo de instrumento
    public function destroy($num_serie, $usuario_id)
    {
        try {
            // Intentamos eliminar el préstamo con las claves compuestas
            $deleted = PrestamoInstrumento::where('num_serie', $num_serie)
                ->where('usuario_id', $usuario_id)
                ->delete();

            if ($deleted) {
                return response()->json(['message' => 'Préstamo eliminado correctamente.']);
            } else {
                return response()->json(['error' => 'Préstamo no encontrado para eliminar.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el préstamo.', 'message' => $e->getMessage()], 500);
        }
    }
}
