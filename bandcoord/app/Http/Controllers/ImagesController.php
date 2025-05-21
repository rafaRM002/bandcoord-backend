<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function uploadImage($file)
    {
        // Validar archivo directamente aquí
        if (!$file->isValid() || !in_array($file->extension(), ['jpg', 'mp3', 'png', 'pdf', 'mp4' ,'webm'])) {
            return [
                'success' => false,
                'message' => 'Archivo no válido'

            ];
        }

        $path = $file->store('files', 'public');

        return [
            'success' => true,
            'path' => asset('storage/' . $path)
        ];
    }
}
