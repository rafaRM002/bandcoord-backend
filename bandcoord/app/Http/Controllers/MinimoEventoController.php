<?php

namespace App\Http\Controllers;

use App\Models\MinimoEvento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class MinimoEventoController extends Controller
{
    // Listar todos los mínimos de instrumentos por evento
    public function index()
    {
        try {
            $minimos = MinimoEvento::with('evento', 'tipoInstrumento')->get();
            return response()->json([
                'message' => 'Listado de mínimos por evento obtenido correctamente.',
                'data' => $minimos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener los mínimos por evento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener un mínimo de instrumento por evento específico
    public function show($evento_id, $instrumento_tipo_id)
    {
        try {
            $minimo = MinimoEvento::with('evento', 'tipoInstrumento')
                ->where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->firstOrFail();

            return response()->json([
                'message' => 'Mínimo de instrumento obtenido correctamente.',
                'data' => $minimo
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Mínimo de instrumento no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener el mínimo de instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    // Crear un nuevo mínimo de instrumento para un evento
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'evento_id' => 'required|exists:eventos,id',
                'instrumento_tipo_id' => [
                    'required',
                    'exists:tipo_instrumentos,instrumento',
                    Rule::unique('minimo_eventos')->where(function ($query) use ($request) {
                        return $query->where('evento_id', $request->evento_id);
                    }),
                ],
                'cantidad' => 'required|integer|min:1',
            ]);

            $minimo = MinimoEvento::create($validated);

            return response()->json([
                'message' => 'Mínimo de instrumento creado correctamente.',
                'data' => $minimo
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el mínimo de instrumento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Actualizar un mínimo de instrumento existente
    public function update(Request $request, $evento_id, $instrumento_tipo_id)
    {
        try {
            // Validamos la cantidad
            $validated = $request->validate([
                'cantidad' => 'required|integer|min:1',
            ]);

            // Buscamos el registro en la tabla 'minimo_eventos' usando la clave compuesta
            $registro = DB::table('minimo_eventos')
                ->where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->first();

            // Si no existe el registro, devolvemos un error 404 con un mensaje
            if (!$registro) {
                return response()->json(['message' => 'No se encontró el registro para actualizar.'], 404);
            }

            // Si lo encontramos, actualizamos la cantidad con el valor
            DB::table('minimo_eventos')
                ->where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->update(['cantidad' => $validated['cantidad']]);

            // Devolvemos una respuesta indicando que se actualizó correctamente
            return response()->json(['message' => 'Registro actualizado correctamente.']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el mínimo de instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar un mínimo de instrumento para un evento
    public function destroy($evento_id, $instrumento_tipo_id)
    {
        try {
            // Buscar y eliminar el registro
            $deleted = MinimoEvento::where('evento_id', $evento_id)
                ->where('instrumento_tipo_id', $instrumento_tipo_id)
                ->delete();

            if ($deleted) {
                return response()->json(['message' => 'Registro eliminado correctamente.'], 200);
            } else {
                return response()->json(['error' => 'Registro no encontrado.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el registro.', 'message' => $e->getMessage()], 500);
        }
    }
}
