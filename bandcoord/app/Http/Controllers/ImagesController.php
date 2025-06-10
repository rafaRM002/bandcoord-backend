<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Gestión de Imágenes
 *
 * APIs para la gestión y carga de archivos multimedia
 */
class ImagesController extends Controller
{
    /**
     * Subir archivo multimedia
     *
     * Permite subir archivos de tipo imagen, audio, video o PDF.
     *
     * @bodyParam file file required El archivo a subir. Tipos permitidos: jpg, mp3, png, pdf, mp4, webm. Example: imagen.jpg
     *
     * @response scenario="success" {
     *    "success": true,
     *    "path": "http://bandcoord.test/storage/files/imagen.jpg"
     * }
     *
     * @response status=422 scenario="Archivo inválido" {
     *    "success": false,
     *    "message": "Archivo no válido"
     * }
     *
     * @param $file El archivo subido
     * @return array Array con el estado de la operación y la ruta del archivo
     */
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
            'path' => asset($path)
        ];
    }
}
