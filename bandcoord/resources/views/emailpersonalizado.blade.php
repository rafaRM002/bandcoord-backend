<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificación de BandCoord</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
<div style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border: 1px solid #e2e8f0;">

    <!-- Cabecera -->
    <div style="background-color: #1e293b; padding: 24px 32px; text-align: center;">
        <h1 style="color: #ffffff; font-size: 22px; margin: 0;">BandCoord</h1>
        <p style="color: #cbd5e1; font-size: 14px; margin-top: 4px;">Notificación del sistema</p>
    </div>

    <!-- Contenido -->
    <div style="padding: 32px;">
        <p style="font-size: 15px; color: #334155; line-height: 1.6; margin: 0;">
            {{ $mensaje }}
        </p>
    </div>

    <!-- Pie -->
    <div style="background-color: #f1f5f9; padding: 20px 32px; text-align: center; font-size: 12px; color: #64748b;">
        Este mensaje ha sido enviado automáticamente por el sistema de BandCoord.<br>
        &copy; {{ date('Y') }} BandCoord. Todos los derechos reservados.
    </div>
</div>
</body>
</html>
