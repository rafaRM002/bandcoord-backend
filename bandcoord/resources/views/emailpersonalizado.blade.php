<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correo Personalizado</title>
</head>
<body style="margin: 0; padding: 0; background-color: #ffffff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
<div style="max-width: 600px; margin: 40px auto; background-color: #1e293b; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.3);">

    <!-- Cabecera con logo -->
    <div style="background-color: #334155; padding: 20px 30px; display: flex; align-items: center;">
        <h2 style="color: white; font-size: 22px; margin: 0;">📬 Mensaje desde BandCoord</h2>
    </div>

    <!-- Cuerpo -->
    <div style="padding: 30px;">
        <p style="font-size: 16px; color: #f1f5f9; margin-bottom: 20px;">
            Hola 👋,
        </p>

        <p style="font-size: 16px; color: #cbd5e1; margin-bottom: 30px;">
            {{ $mensaje }}
        </p>
    </div>

    <!-- Pie -->
    <div style="background-color: #334155; padding: 20px 30px; text-align: center; font-size: 12px; color: #94a3b8;">
        Este mensaje fue generado automáticamente por el sistema de BandCoord.
    </div>
</div>
</body>
</html>
