<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use App\Models\PrestamoInstrumento;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * @group Gestión de Préstamos de Instrumentos
 *
 * APIs para gestionar los préstamos de instrumentos
 */
class PrestamoInstrumentoController extends Controller
{
    /**
     * Listar préstamos
     *
     * Obtiene una lista de todos los préstamos de instrumentos con sus relaciones.
     *
     * @response 200 {
     *   "message": "Listado de préstamos obtenido correctamente.",
     *   "data": [
     *     {
     *       "num_serie": "123ABC",
     *       "usuario_id": 1,
     *       "fecha_prestamo": "2025-06-10",
     *       "fecha_devolucion": null,
     *       "instrumento": {
     *         "numero_serie": "123ABC",
     *         "nombre": "Guitarra Eléctrica",
     *         "estado": "prestado"
     *       },
     *       "usuario": {
     *         "id": 1,
     *         "nombre": "Juan Pérez"
     *       }
     *     }
     *   ]
     * }
     * @response 500 {
     *   "error": "Error al obtener los préstamos.",
     *   "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Mostrar préstamo específico
     *
     * Obtiene los detalles de un préstamo específico por número de serie y ID de usuario.
     *
     * @urlParam num_serie string required El número de serie del instrumento. Example: 123ABC
     * @urlParam usuario_id integer required El ID del usuario. Example: 1
     *
     * @response 200 {
     *   "message": "Préstamo obtenido correctamente.",
     *   "data": {
     *     "num_serie": "123ABC",
     *     "usuario_id": 1,
     *     "fecha_prestamo": "2025-06-10",
     *     "fecha_devolucion": null,
     *     "instrumento": {
     *       "numero_serie": "123ABC",
     *       "nombre": "Guitarra Eléctrica",
     *       "estado": "prestado"
     *     },
     *     "usuario": {
     *       "id": 1,
     *       "nombre": "Juan Pérez"
     *     }
     *   }
     * }
     * @response 404 {"error": "Préstamo no encontrado."}
     * @response 500 {
     *   "error": "Error al obtener el préstamo.",
     *   "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Crear préstamo
     *
     * Crea un nuevo préstamo de instrumento y actualiza el estado del instrumento.
     *
     * @bodyParam num_serie string required Número de serie del instrumento. Example: 123ABC
     * @bodyParam usuario_id integer required ID del usuario que solicita el préstamo. Example: 1
     * @bodyParam fecha_prestamo date required Fecha del préstamo. Example: 2025-06-10
     * @bodyParam fecha_devolucion date opcional Fecha de devolución programada. Example: 2025-06-17
     *
     * @response 201 {
     *   "message": "Préstamo creado correctamente.",
     *   "data": {
     *     "num_serie": "123ABC",
     *     "usuario_id": 1,
     *     "fecha_prestamo": "2025-06-10",
     *     "fecha_devolucion": null
     *   }
     * }
     * @response 400 {"error": "El instrumento no está disponible para préstamo."}
     * @response 400 {"error": "Este usuario ya tiene un préstamo activo para este instrumento."}
     * @response 404 {"error": "Instrumento no encontrado."}
     * @response 422 {"error": {"num_serie": ["El número de serie es obligatorio."]}}
     */
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

    /**
     * Actualizar préstamo
     *
     * Actualiza las fechas de un préstamo existente.
     *
     * @urlParam num_serie string required Número de serie del instrumento. Example: 123ABC
     * @urlParam usuario_id integer required ID del usuario. Example: 1
     * @bodyParam fecha_prestamo date required Nueva fecha de préstamo. Example: 2025-06-10
     * @bodyParam fecha_devolucion date required Nueva fecha de devolución. Example: 2025-06-17
     *
     * @response {
     *   "message": "Préstamo actualizado correctamente."
     * }
     * @response 404 {
     *   "message": "No se encontró el préstamo para actualizar."
     * }
     * @response 422 {
     *   "error": {
     *     "fecha_prestamo": ["La fecha de préstamo es obligatoria."]
     *   }
     * }
     */
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

    /**
     * Eliminar préstamo
     *
     * Elimina un préstamo existente.
     *
     * @urlParam num_serie string required Número de serie del instrumento. Example: 123ABC
     * @urlParam usuario_id integer required ID del usuario. Example: 1
     *
     * @response {
     *   "message": "Préstamo eliminado correctamente."
     * }
     * @response 404 {
     *   "error": "Préstamo no encontrado para eliminar."
     * }
     * @response 500 {
     *   "error": "Error al eliminar el préstamo.",
     *   "message": "Mensaje de error específico"
     * }
     */
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
