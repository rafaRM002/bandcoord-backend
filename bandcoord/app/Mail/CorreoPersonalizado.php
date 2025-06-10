<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * @description Clase para envío de correos personalizados
 */
class CorreoPersonalizado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string Mensaje que se enviará en el correo
     */
    public $mensaje;

    /**
     * Crear una nueva instancia del mailable.
     *
     * @description Inicializa un nuevo correo personalizado
     * @param string $mensaje El mensaje que se incluirá en el correo
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Construye el mensaje.
     *
     * @description Configura el asunto del correo y la vista a utilizar
     * @return $this
     *
     * @response {
     *   "subject": "Mensaje personalizado",
     *   "view": "emailpersonalizado"
     * }
     */
    public function build()
    {
        return $this->subject('Mensaje personalizado')
            ->view('emailpersonalizado');
    }
}
