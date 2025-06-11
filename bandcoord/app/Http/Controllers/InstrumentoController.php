<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use App\Models\TipoInstrumento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * @group Gestión de Instrumentos
 *
 * APIs para gestionar instrumentos musicales
 */
class InstrumentoController extends Controller
{
    /**
     * Listar todos los instrumentos
     *
     * Obtiene una lista de todos los instrumentos registrados en el sistema.
     *
     * @response 200 {
     *  "data": [
     *    {
     *      "numero_serie": "ABC123",
     *      "estado": "disponible",
     *      "instrumento_tipo_id": "Trompeta",
     *      "created_at": "2025-06-10T10:00:00.000000Z",
     *      "updated_at": "2025-06-10T10:00:00.000000Z"
     *    }
     *  ]
     * }
     * @response 500 {
     *  "error": "Error al obtener la lista de instrumentos.",
     *  "message": "Mensaje de error específico"
     * }
     */
    public function index()
    {
        try {
            return response()->json(Instrumento::all());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la lista de instrumentos.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Mostrar un instrumento específico
     *
     * Obtiene los detalles de un instrumento específico por su número de serie.
     *
     * @urlParam numero_serie required El número de serie del instrumento. Example: ABC123
     *
     * @response 200 {
     *  "numero_serie": "ABC123",
     *  "estado": "disponible",
     *  "instrumento_tipo_id": "Trompeta",
     *  "created_at": "2025-06-10T10:00:00.000000Z",
     *  "updated_at": "2025-06-10T10:00:00.000000Z"
     * }
     * @response 404 {
     *  "message": "El instrumento con este número de serie no existe."
     * }
     * @response 500 {
     *  "error": "Error al buscar el instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Crear un nuevo instrumento
     *
     * Crea un nuevo instrumento con los datos proporcionados.
     *
     * @bodyParam numero_serie string required El número de serie único del instrumento. Example: ABC123
     * @bodyParam estado string required Estado del instrumento (prestado, disponible, en reparacion). Example: disponible
     * @bodyParam instrumento_tipo_id string required Tipo de instrumento (Trompeta, Fliscorno, Trombon, Bombardino, Tuba, Corneta, Caja, Tambor, other). Example: Trompeta
     *
     * @response 201 {
     *  "numero_serie": "ABC123",
     *  "estado": "disponible",
     *  "instrumento_tipo_id": "Trompeta",
     *  "created_at": "2025-06-10T10:00:00.000000Z",
     *  "updated_at": "2025-06-10T10:00:00.000000Z"
     * }
     * @response 422 {
     *  "error": {
     *    "numero_serie": ["El número de serie es obligatorio."],
     *    "estado": ["El estado debe ser uno de los siguientes: prestado, disponible, en reparacion."],
     *    "instrumento_tipo_id": ["El tipo de instrumento es obligatorio."]
     *  }
     * }
     * @response 500 {
     *  "error": "Error al crear el instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
    public function store(Request $request)
    {
        try {
            // Obtener tipos válidos desde la base de datos
//            $tiposDesdeDB = TipoInstrumento::pluck('instrumento')->map(function ($i) {
//                return strtolower(trim($i));
//            })->toArray();
            $tiposDesdeDB = TipoInstrumento::pluck('instrumento')->map(function ($i) {
                return trim($i);
            })->toArray();

            // Agregar 'other' si es válido en tu lógica
            $tiposPermitidos = array_merge($tiposDesdeDB);

            $messages = [
                'numero_serie.required' => 'El número de serie es obligatorio.',
                'numero_serie.unique' => 'Este número de serie ya existe.',
                'estado.required' => 'El estado es obligatorio.',
                'estado.in' => 'El estado debe ser uno de los siguientes: prestado, disponible, en reparacion.',
                'instrumento_tipo_id.required' => 'El tipo de instrumento es obligatorio.',
                'instrumento_tipo_id.in' => 'El tipo de instrumento debe ser uno de los siguientes: ' . implode(', ', $tiposDesdeDB),
            ];

            $validated = $request->validate([
                'numero_serie' => 'required|unique:instrumentos,numero_serie',
                'estado' => 'required|in:prestado,disponible,en reparacion',
                'instrumento_tipo_id' => [
                    'required',
                    'string',
                    Rule::in($tiposPermitidos),
                ],
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

    /**
     * Actualizar un instrumento
     *
     * Actualiza los datos de un instrumento existente.
     *
     * @urlParam numero_serie required El número de serie del instrumento a actualizar. Example: ABC123
     * @bodyParam estado string required Nuevo estado del instrumento (prestado, disponible, en reparacion). Example: prestado
     * @bodyParam instrumento_tipo_id string required Nuevo tipo de instrumento. Example: Trompeta
     *
     * @response 200 {
     *  "numero_serie": "ABC123",
     *  "estado": "prestado",
     *  "instrumento_tipo_id": "Trompeta",
     *  "created_at": "2025-06-10T10:00:00.000000Z",
     *  "updated_at": "2025-06-10T10:00:00.000000Z"
     * }
     * @response 404 {
     *  "message": "Instrumento no encontrado"
     * }
     * @response 422 {
     *  "error": {
     *    "estado": ["El estado debe ser uno de los siguientes: prestado, disponible, en reparacion."],
     *    "instrumento_tipo_id": ["El tipo de instrumento no es válido."]
     *  }
     * }
     * @response 500 {
     *  "error": "Error al actualizar el instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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

    /**
     * Eliminar un instrumento
     *
     * Elimina un instrumento específico del sistema.
     *
     * @urlParam numero_serie required El número de serie del instrumento a eliminar. Example: ABC123
     *
     * @response 200 {
     *  "message": "Instrumento eliminado correctamente."
     * }
     * @response 404 {
     *  "message": "El instrumento con este número de serie no existe."
     * }
     * @response 500 {
     *  "error": "Error al eliminar el instrumento.",
     *  "message": "Mensaje de error específico"
     * }
     */
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
