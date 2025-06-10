<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group Gestión de Eventos
 *
 * APIs para gestionar eventos musicales
 */
class EventoController extends Controller
{
    /**
     * Listar todos los eventos
     *
     * Obtiene una lista de todos los eventos registrados en el sistema.
     *
     * @response 200 {
     *    "message": "Eventos obtenidos correctamente.",
     *    "eventos": [
     *      {
     *        "id": 1,
     *        "nombre": "Ensayo General",
     *        "fecha": "2025-06-15",
     *        "lugar": "Sala de Ensayos Principal",
     *        "hora": "19:00",
     *        "estado": "planificado",
     *        "tipo": "ensayo",
     *        "entidad_id": 1
     *      }
     *    ]
     * }
     * @response 500 {
     *    "error": "Hubo un problema al obtener los eventos.",
     *    "message": "Error message here"
     * }
     */
    public function index()
    {
        try {
            $eventos = Evento::all();
            return response()->json([
                'message' => 'Eventos obtenidos correctamente.',
                'eventos' => $eventos
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener los eventos.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener un evento específico
     *
     * Muestra la información detallada de un evento específico.
     *
     * @urlParam id required El ID del evento. Example: 1
     *
     * @response 200 {
     *    "message": "Evento obtenido correctamente.",
     *    "evento": {
     *      "id": 1,
     *      "nombre": "Ensayo General",
     *      "fecha": "2025-06-15",
     *      "lugar": "Sala de Ensayos Principal",
     *      "hora": "19:00",
     *      "estado": "planificado",
     *      "tipo": "ensayo",
     *      "entidad_id": 1
     *    }
     * }
     * @response 404 {
     *    "error": "Evento no encontrado.",
     *    "message": "El evento con el ID 1 no existe."
     * }
     */
    public function show($id)
    {
        try {
            $evento = Evento::findOrFail($id);
            return response()->json([
                'message' => 'Evento obtenido correctamente.',
                'evento' => $evento
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Evento no encontrado.',
                'message' => 'El evento con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al obtener el evento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Crear un nuevo evento
     *
     * Crea un nuevo evento con los datos proporcionados.
     *
     * @bodyParam nombre string required Nombre del evento. Example: Ensayo General
     * @bodyParam fecha date required Fecha del evento (Y-m-d). Example: 2025-06-15
     * @bodyParam lugar string required Lugar donde se realizará el evento. Example: Sala de Ensayos Principal
     * @bodyParam hora string required Hora del evento (H:i). Example: 19:00
     * @bodyParam estado string required Estado del evento (planificado, en progreso, finalizado). Example: planificado
     * @bodyParam tipo string required Tipo de evento (ensayo, procesion, concierto, pasacalles). Example: ensayo
     * @bodyParam entidad_id integer required ID de la entidad asociada. Example: 1
     *
     * @response 200 {
     *    "message": "Evento creado correctamente.",
     *    "evento": {
     *      "id": 1,
     *      "nombre": "Ensayo General",
     *      "fecha": "2025-06-15",
     *      "lugar": "Sala de Ensayos Principal",
     *      "hora": "19:00",
     *      "estado": "planificado",
     *      "tipo": "ensayo",
     *      "entidad_id": 1
     *    }
     * }
     * @response 422 {
     *    "message": "The given data was invalid.",
     *    "errors": {
     *      "nombre": ["El campo nombre es obligatorio."]
     *    }
     * }
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos del evento
            $validated = $request->validate([
                'nombre' => 'required|string',
                'fecha' => 'required|date',
                'lugar' => 'required|string',
                'hora' => 'required|date_format:H:i',
                'estado' => 'required|in:planificado,en progreso,finalizado',
                'tipo' => 'required|in:ensayo,procesion,concierto,pasacalles',
                'entidad_id' => 'required|exists:entidades,id',
            ]);

            // Crear el evento
            $evento = Evento::create($validated);

            return response()->json([
                'message' => 'Evento creado correctamente.',
                'evento' => $evento
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al crear el evento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar un evento
     *
     * Actualiza la información de un evento existente.
     *
     * @urlParam id required El ID del evento. Example: 1
     * @bodyParam nombre string Nombre del evento. Example: Ensayo General Actualizado
     * @bodyParam fecha date Fecha del evento (Y-m-d). Example: 2025-06-16
     * @bodyParam lugar string Lugar donde se realizará el evento. Example: Sala de Ensayos Secundaria
     * @bodyParam hora string Hora del evento (H:i). Example: 20:00
     * @bodyParam estado string Estado del evento (planificado, en progreso, finalizado). Example: en progreso
     * @bodyParam tipo string Tipo de evento (ensayo, procesion, concierto, pasacalles). Example: ensayo
     * @bodyParam entidad_id integer ID de la entidad asociada. Example: 1
     *
     * @response 200 {
     *    "message": "Evento actualizado correctamente.",
     *    "evento": {
     *      "id": 1,
     *      "nombre": "Ensayo General Actualizado",
     *      "fecha": "2025-06-16",
     *      "lugar": "Sala de Ensayos Secundaria",
     *      "hora": "20:00",
     *      "estado": "en progreso",
     *      "tipo": "ensayo",
     *      "entidad_id": 1
     *    }
     * }
     * @response 404 {
     *    "error": "Evento no encontrado.",
     *    "message": "El evento con el ID 1 no existe."
     * }
     */
    public function update(Request $request, $id)
    {
        try {
            // Buscar el evento
            $evento = Evento::findOrFail($id);

            // Validar los datos de actualización
            $validated = $request->validate([
                'nombre' => 'sometimes|required|string',
                'fecha' => 'sometimes|required|date',
                'lugar' => 'sometimes|required|string',
                'hora' => 'sometimes|required|date_format:H:i',
                'estado' => 'sometimes|required|in:planificado,en progreso,finalizado',
                'tipo' => 'sometimes|required|in:ensayo,procesion,concierto,pasacalles',
                'entidad_id' => 'sometimes|required|exists:entidades,id',
            ]);

            // Actualizar el evento
            $evento->update($validated);

            return response()->json([
                'message' => 'Evento actualizado correctamente.',
                'evento' => $evento
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Evento no encontrado.',
                'message' => 'El evento con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al actualizar el evento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un evento
     *
     * Elimina un evento específico del sistema.
     *
     * @urlParam id required El ID del evento a eliminar. Example: 1
     *
     * @response 200 {
     *    "message": "Evento eliminado correctamente."
     * }
     * @response 404 {
     *    "error": "Evento no encontrado.",
     *    "message": "El evento con el ID 1 no existe."
     * }
     */
    public function destroy($id)
    {
        try {
            // Buscar el evento y eliminarlo
            $evento = Evento::findOrFail($id);
            $evento->delete();

            return response()->json([
                'message' => 'Evento eliminado correctamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Evento no encontrado.',
                'message' => 'El evento con el ID ' . $id . ' no existe.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un problema al eliminar el evento.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
