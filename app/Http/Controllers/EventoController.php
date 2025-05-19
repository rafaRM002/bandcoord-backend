<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventoController extends Controller
{
    // Listar todos los eventos
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

    // Obtener un evento
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

    // Crear un nuevo evento
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

    // Actualizar un evento existente
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

    // Eliminar un evento
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
