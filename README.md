# BandCoord Backend

¡Bienvenido a **BandCoord Backend**!  
Este es el backend profesional para la gestión integral de bandas de música, basado en Laravel y diseñado para cubrir todas las necesidades de administración, eventos, usuarios, instrumentos, composiciones, mensajería interna y mucho más.

---

## Tabla de Contenidos

- [Descripción General](#descripción-general)
- [Instalación y Despliegue](#instalación-y-despliegue)
- [Endpoints de la API](#endpoints-de-la-api)
- [Funcionalidades Avanzadas](#funcionalidades-avanzadas)
- [Autenticación y Seguridad](#autenticación-y-seguridad)
- [Seeders, Migrations y Artisan](#seeders-migrations-y-artisan)
- [Contribución](#contribución)
- [Licencia](#licencia)

---

## Descripción General

**BandCoord Backend** es una potente API RESTful para la gestión de bandas de música: registro y autenticación, administración de usuarios (roles y permisos), eventos, préstamos y gestión de instrumentos, composiciones, mensajes internos, así como otras necesidades habituales en asociaciones musicales. Está construido en **Laravel** (PHP), siguiendo las mejores prácticas de seguridad y escalabilidad.

---

## Instalación y Despliegue

### Requisitos Previos

- PHP >= 8.0
- Composer
- MySQL / MariaDB (u otro gestor compatible)
- Node.js y npm (solo si vas a compilar assets del frontend)
- Extensiones PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, etc.

### Pasos de Instalación

1. **Clona el repositorio**  
   ```bash
   git clone https://github.com/rafaRM002/bandcoord-backend.git
   cd bandcoord-backend/bandcoord
   ```

2. **Instala dependencias**  
   ```bash
   composer install
   ```

3. **Copia el archivo de entorno y configura**  
   ```bash
   cp .env.example .env
   ```
   Modifica las variables de entorno necesarias en `.env` (DB, mail, etc).

4. **Genera la key de la aplicación**  
   ```bash
   php artisan key:generate
   ```

5. **Ejecuta migraciones y seeders**  
   ```bash
   php artisan migrate --seed
   ```

6. **(Opcional) Configura el servidor web**  
   Por defecto, puedes usar el servidor embebido:
   ```bash
   php artisan serve
   ```
   El backend quedará accesible en `http://localhost:8000`

---

## Endpoints de la API

### Autenticación (Públicos)

- `POST /api/register`  
  Registro de nuevo usuario.
- `POST /api/login`  
  Login de usuario y obtención de token.

### Correo Personalizado

- `POST /api/mailTo`  
  Envía un correo personalizado desde un usuario autenticado.

### Usuario (Requiere Autenticación y Rol Admin, salvo `/me`)

- `POST /api/logout`  
  Cerrar sesión (requiere token).
- `GET /api/me`  
  Obtener datos del usuario autenticado.
- `GET /api/usuarios`  
  Listar todos los usuarios.
- `GET /api/usuarios/{id}`  
  Ver un usuario concreto.
- `PUT /api/usuarios/{id}`  
  Modificar usuario.
- `DELETE /api/usuarios/{id}`  
  Eliminar usuario.
- `PATCH /api/usuarios/{id}/approve`  
  Aprobar usuario (activar).
- `PATCH /api/usuarios/{id}/block`  
  Bloquear usuario.

### Instrumentos

- `GET|POST|PUT|DELETE /api/instrumentos`  
  Gestión CRUD de instrumentos (solo admin).
- `GET|POST|PUT|DELETE /api/tipo-instrumentos`  
  Gestión de tipos de instrumento (solo admin).

### Eventos

- `GET|POST|PUT|DELETE /api/eventos`  
  Gestión de eventos (solo admin).
- `GET|POST|PUT|DELETE /api/minimos-evento`  
  Gestión de mínimos de instrumentos por evento (solo admin).
- `GET|POST|PUT|DELETE /api/evento-usuario`  
  Gestión de la relación usuario-evento (inscripción, cambios de estado, etc).

### Préstamos

- `GET|POST|PUT|DELETE /api/prestamos`  
  Gestión de préstamos de instrumentos (solo admin).
- `GET|PUT|DELETE /api/prestamos/{num_serie}/{usuario_id}`  
  Consulta o gestión de un préstamo concreto.

### Entidades

- `GET|POST|PUT|DELETE /api/entidades`  
  CRUD para entidades asociadas (solo admin).

### Composiciones

- `GET|POST|PUT|DELETE /api/composiciones`  
  Gestión de composiciones musicales (solo admin).
- `GET|POST|DELETE /api/composicion-usuario`  
  Relación usuario-composición (p.ej. asignar músicos a composiciones).

### Mensajería Interna

- `GET|POST|PUT|DELETE /api/mensajes`  
  Gestión de mensajes internos.
- `GET|POST|PUT|DELETE /api/mensaje-usuarios`  
  Relación mensaje-usuarios (seguimiento de mensajes enviados/recibidos, marcar como leído, etc).

---

## Funcionalidades Avanzadas

- **Seeders**: La aplicación dispone de seeders para poblar la base de datos con datos de ejemplo (usuarios, instrumentos, eventos, etc).
- **Middleware personalizados**: Control de acceso por roles (admin, usuario normal).
- **Autenticación con Laravel Sanctum**: Tokens seguros para APIs SPA/Mobile.
- **Gestión de relaciones complejas**: Eventos-usuarios, composiciones-usuarios, préstamos-instrumentos, etc.
- **Sistema de mensajería interna**: Permite enviar mensajes privados entre usuarios y consultar el estado de los mismos.
- **Correo personalizado**: Endpoint para envío de emails internos desde la plataforma.

---

## Autenticación y Seguridad

- Basada en **Laravel Sanctum** (tokens personales).
- Los endpoints críticos requieren autenticación y/o permisos de administrador.
- CORS configurado para permitir consultas seguras desde dominios permitidos.
- Protección de rutas mediante middlewares personalizados y estándar de Laravel.

---

## Seeders, Migrations y Artisan

- **Migraciones**: Toda la estructura de la BBDD está versionada vía migraciones.
- **Seeders**: Ejecuta `php artisan db:seed` para poblar la BBDD con datos iniciales.
- **Comandos Artisan útiles**:
  - `php artisan migrate` / `php artisan migrate:rollback`
  - `php artisan db:seed`
  - `php artisan serve`
  - `php artisan tinker` (para pruebas interactivas)

---

## Contribución

¿Quieres contribuir? ¡Eres bienvenido!  
Haz un fork, crea tu rama y haz un Pull Request siguiendo las buenas prácticas de Laravel.

---

## Licencia

Este proyecto se distribuye bajo la licencia MIT.

---