<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InstrumentoController extends Controller
{
    // Listar todos los instrumentos
    public function index()
    {
        try {
            return response()->json(Instrumento::all());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la lista de instrumentos.', 'message' => $e->getMessage()], 500);
        }
    }

    // Obtener un instrumento por su numero_serie
    public function show($numero_serie)
    {
        try {
            $instrumento = Instrumento::find($numero_serie);

            if (!$instrumento) {
                return response()->json(['message' => 'El instrumento con este número de serie no existe.'], 404);
            }

            return response()->json($instrumento);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar el instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    // Crear un nuevo instrumento
    public function store(Request $request)
    {
        try {
            $tiposPredefinidos = ['Trompeta', 'Fliscorno', 'Trombon', 'Bombardino', 'Tuba', 'Corneta', 'Caja', 'Tambor'];

            $messages = [
                'numero_serie.required' => 'El número de serie es obligatorio.',
                'numero_serie.unique' => 'Este número de serie ya existe.',
                'estado.required' => 'El estado es obligatorio.',
                'estado.in' => 'El estado debe ser uno de los siguientes: prestado, disponible, en reparacion.',
                'instrumento_tipo_id.required' => 'El tipo de instrumento es obligatorio.',
                'instrumento_tipo_id.in' => 'El tipo de instrumento debe ser uno de los siguientes: ' . implode(', ', $tiposPredefinidos) . ', o "other".',
            ];

            $validated = $request->validate([
                'numero_serie' => 'required|unique:instrumentos,numero_serie',
                'estado' => 'required|in:prestado,disponible,en reparacion',
                'instrumento_tipo_id' => 'required|string|in:' . implode(',', $tiposPredefinidos) . ',other',
            ], $messages);

            $instrumento = Instrumento::create($validated);

            return response()->json([
                'numero_serie' => $instrumento->numero_serie,
                'estado' => $instrumento->estado,
                'instrumento_tipo_id' => $instrumento->instrumento_tipo_id,
                'created_at' => $instrumento->created_at,
                'updated_at' => $instrumento->updated_at,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    // Actualizar un instrumento por su numero_serie
    public function update(Request $request, $numero_serie)
    {
        try {
            $validated = $request->validate([
                'estado' => 'required|in:prestado,disponible,en reparacion',
                'instrumento_tipo_id' => 'required|string|in:Trompeta,Fliscorno,Trombon,Bombardino,Tuba,Corneta,Caja,Tambor,other',
            ]);

            $instrumento = Instrumento::where('numero_serie', $numero_serie)->first();

            if (!$instrumento) {
                return response()->json(['message' => 'Instrumento no encontrado'], 404);
            }

            $instrumento->estado = $validated['estado'];
            $instrumento->instrumento_tipo_id = $validated['instrumento_tipo_id'];
            $instrumento->save();

            return response()->json($instrumento);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el instrumento.', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar un instrumento por su numero_serie
    public function destroy($numero_serie)
    {
        try {
            $instrumento = Instrumento::find($numero_serie);

            if (!$instrumento) {
                return response()->json(['message' => 'El instrumento con este número de serie no existe.'], 404);
            }

            $instrumento->delete();

            return response()->json(['message' => 'Instrumento eliminado correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el instrumento.', 'message' => $e->getMessage()], 500);
        }
    }
}
