<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>BandCoord API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-autenticacion" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autenticacion">
                    <a href="#autenticacion">Autenticación</a>
                </li>
                                    <ul id="tocify-subheader-autenticacion" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="autenticacion-POSTapi-register">
                                <a href="#autenticacion-POSTapi-register">Registrar un nuevo usuario.

Este endpoint permite registrar un nuevo usuario. La cuenta quedará en estado "pendiente" hasta que un administrador la apruebe.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-POSTapi-login">
                                <a href="#autenticacion-POSTapi-login">Iniciar sesión.

Permite iniciar sesión y obtener un token de autenticación.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-POSTapi-logout">
                                <a href="#autenticacion-POSTapi-logout">POST api/logout</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-composiciones" class="tocify-header">
                <li class="tocify-item level-1" data-unique="composiciones">
                    <a href="#composiciones">Composiciones</a>
                </li>
                                    <ul id="tocify-subheader-composiciones" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="composiciones-GETapi-composiciones">
                                <a href="#composiciones-GETapi-composiciones">Listar todas las composiciones.

Devuelve una lista de todas las composiciones disponibles en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composiciones-POSTapi-composiciones">
                                <a href="#composiciones-POSTapi-composiciones">POST api/composiciones</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composiciones-GETapi-composiciones--id-">
                                <a href="#composiciones-GETapi-composiciones--id-">Obtener una composición.

Devuelve los detalles de una composición específica según su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composiciones-PUTapi-composiciones--id-">
                                <a href="#composiciones-PUTapi-composiciones--id-">PUT api/composiciones/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composiciones-DELETEapi-composiciones--id-">
                                <a href="#composiciones-DELETEapi-composiciones--id-">DELETE api/composiciones/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-composicion-usuario" class="tocify-header">
                <li class="tocify-item level-1" data-unique="composicion-usuario">
                    <a href="#composicion-usuario">Composición-Usuario</a>
                </li>
                                    <ul id="tocify-subheader-composicion-usuario" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="composicion-usuario-GETapi-composicion-usuario">
                                <a href="#composicion-usuario-GETapi-composicion-usuario">Listar todas las composiciones-usuario.

Devuelve todos los registros que relacionan composiciones con usuarios.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composicion-usuario-POSTapi-composicion-usuario">
                                <a href="#composicion-usuario-POSTapi-composicion-usuario">POST api/composicion-usuario</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composicion-usuario-GETapi-composicion-usuario--composicion_id---usuario_id-">
                                <a href="#composicion-usuario-GETapi-composicion-usuario--composicion_id---usuario_id-">Obtener una relación composición-usuario.

Devuelve un registro específico que relaciona una composición con un usuario.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="composicion-usuario-DELETEapi-composicion-usuario--composicion_id---usuario_id-">
                                <a href="#composicion-usuario-DELETEapi-composicion-usuario--composicion_id---usuario_id-">DELETE api/composicion-usuario/{composicion_id}/{usuario_id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-prestamos">
                                <a href="#endpoints-GETapi-prestamos">Listar todos los préstamos.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-prestamos">
                                <a href="#endpoints-POSTapi-prestamos">Crear nuevo préstamo.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-prestamos--num_serie---usuario_id-">
                                <a href="#endpoints-GETapi-prestamos--num_serie---usuario_id-">Obtener un préstamo específico.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-prestamos--num_serie---usuario_id-">
                                <a href="#endpoints-PUTapi-prestamos--num_serie---usuario_id-">Actualizar préstamo.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-prestamos--num_serie---usuario_id-">
                                <a href="#endpoints-DELETEapi-prestamos--num_serie---usuario_id-">Eliminar préstamo.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-entidades" class="tocify-header">
                <li class="tocify-item level-1" data-unique="entidades">
                    <a href="#entidades">Entidades</a>
                </li>
                                    <ul id="tocify-subheader-entidades" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="entidades-GETapi-entidades">
                                <a href="#entidades-GETapi-entidades">Listar todas las entidades.

Devuelve una lista con todas las entidades registradas en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="entidades-POSTapi-entidades">
                                <a href="#entidades-POSTapi-entidades">POST api/entidades</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="entidades-GETapi-entidades--id-">
                                <a href="#entidades-GETapi-entidades--id-">Obtener una entidad específica.

Recupera una entidad a partir de su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="entidades-PUTapi-entidades--id-">
                                <a href="#entidades-PUTapi-entidades--id-">PUT api/entidades/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="entidades-DELETEapi-entidades--id-">
                                <a href="#entidades-DELETEapi-entidades--id-">DELETE api/entidades/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-evento-usuario" class="tocify-header">
                <li class="tocify-item level-1" data-unique="evento-usuario">
                    <a href="#evento-usuario">Evento Usuario</a>
                </li>
                                    <ul id="tocify-subheader-evento-usuario" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="evento-usuario-GETapi-evento-usuario">
                                <a href="#evento-usuario-GETapi-evento-usuario">Listar todos los eventos de usuarios.

Obtiene un listado completo de todas las relaciones evento-usuario.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="evento-usuario-POSTapi-evento-usuario">
                                <a href="#evento-usuario-POSTapi-evento-usuario">POST api/evento-usuario</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="evento-usuario-GETapi-evento-usuario--evento_id---usuario_id-">
                                <a href="#evento-usuario-GETapi-evento-usuario--evento_id---usuario_id-">Obtener un evento_usuario específico.

Devuelve la relación entre un evento y un usuario específica.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="evento-usuario-PUTapi-evento-usuario--evento_id---usuario_id-">
                                <a href="#evento-usuario-PUTapi-evento-usuario--evento_id---usuario_id-">PUT api/evento-usuario/{evento_id}/{usuario_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="evento-usuario-DELETEapi-evento-usuario--evento_id---usuario_id-">
                                <a href="#evento-usuario-DELETEapi-evento-usuario--evento_id---usuario_id-">DELETE api/evento-usuario/{evento_id}/{usuario_id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-eventos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="eventos">
                    <a href="#eventos">Eventos</a>
                </li>
                                    <ul id="tocify-subheader-eventos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="eventos-GETapi-eventos">
                                <a href="#eventos-GETapi-eventos">Listar todos los eventos.

Devuelve un listado completo con todos los eventos registrados.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="eventos-POSTapi-eventos">
                                <a href="#eventos-POSTapi-eventos">POST api/eventos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="eventos-GETapi-eventos--id-">
                                <a href="#eventos-GETapi-eventos--id-">Obtener un evento específico.

Devuelve la información detallada de un evento según su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="eventos-PUTapi-eventos--id-">
                                <a href="#eventos-PUTapi-eventos--id-">PUT api/eventos/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="eventos-DELETEapi-eventos--id-">
                                <a href="#eventos-DELETEapi-eventos--id-">DELETE api/eventos/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-instrumentos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="instrumentos">
                    <a href="#instrumentos">Instrumentos</a>
                </li>
                                    <ul id="tocify-subheader-instrumentos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="instrumentos-GETapi-instrumentos">
                                <a href="#instrumentos-GETapi-instrumentos">Listar instrumentos

Obtiene un listado de todos los instrumentos registrados en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="instrumentos-POSTapi-instrumentos">
                                <a href="#instrumentos-POSTapi-instrumentos">Crear instrumento

Registra un nuevo instrumento en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="instrumentos-GETapi-instrumentos--id-">
                                <a href="#instrumentos-GETapi-instrumentos--id-">Mostrar instrumento

Obtiene los detalles de un instrumento específico por su número de serie.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="instrumentos-PUTapi-instrumentos--id-">
                                <a href="#instrumentos-PUTapi-instrumentos--id-">Actualizar instrumento

Actualiza la información de un instrumento existente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="instrumentos-DELETEapi-instrumentos--id-">
                                <a href="#instrumentos-DELETEapi-instrumentos--id-">Eliminar instrumento

Elimina un instrumento del sistema.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-mensajes" class="tocify-header">
                <li class="tocify-item level-1" data-unique="mensajes">
                    <a href="#mensajes">Mensajes</a>
                </li>
                                    <ul id="tocify-subheader-mensajes" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="mensajes-GETapi-mensajes">
                                <a href="#mensajes-GETapi-mensajes">Listar mensajes

Obtiene un listado de todos los mensajes con información del emisor.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-POSTapi-mensajes">
                                <a href="#mensajes-POSTapi-mensajes">Crear mensaje

Crea un nuevo mensaje en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-GETapi-mensajes--id-">
                                <a href="#mensajes-GETapi-mensajes--id-">Mostrar mensaje

Obtiene los detalles de un mensaje específico incluyendo información del emisor.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-PUTapi-mensajes--id-">
                                <a href="#mensajes-PUTapi-mensajes--id-">Actualizar mensaje

Actualiza un mensaje existente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-DELETEapi-mensajes--id-">
                                <a href="#mensajes-DELETEapi-mensajes--id-">Eliminar mensaje

Elimina un mensaje del sistema.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-mensajes-usuarios" class="tocify-header">
                <li class="tocify-item level-1" data-unique="mensajes-usuarios">
                    <a href="#mensajes-usuarios">Mensajes-Usuarios</a>
                </li>
                                    <ul id="tocify-subheader-mensajes-usuarios" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="mensajes-usuarios-GETapi-mensaje-usuarios">
                                <a href="#mensajes-usuarios-GETapi-mensaje-usuarios">Listar relaciones

Obtiene todas las relaciones entre mensajes y usuarios.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-usuarios-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
                                <a href="#mensajes-usuarios-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">Mostrar relación

Obtiene una relación específica entre mensaje y usuario.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-usuarios-POSTapi-mensaje-usuarios">
                                <a href="#mensajes-usuarios-POSTapi-mensaje-usuarios">Crear relación

Crea una nueva relación entre mensaje y usuario.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-usuarios-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
                                <a href="#mensajes-usuarios-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">Actualizar estado

Actualiza el estado de lectura de un mensaje para un usuario.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="mensajes-usuarios-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
                                <a href="#mensajes-usuarios-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">Eliminar relación

Elimina una relación entre mensaje y usuario.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-minimos-por-evento" class="tocify-header">
                <li class="tocify-item level-1" data-unique="minimos-por-evento">
                    <a href="#minimos-por-evento">Mínimos por Evento</a>
                </li>
                                    <ul id="tocify-subheader-minimos-por-evento" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="minimos-por-evento-GETapi-minimos-evento">
                                <a href="#minimos-por-evento-GETapi-minimos-evento">Listar mínimos

Obtiene una lista de todos los mínimos de instrumentos requeridos por evento.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="minimos-por-evento-POSTapi-minimos-evento">
                                <a href="#minimos-por-evento-POSTapi-minimos-evento">Crear mínimo

Establece un nuevo mínimo de instrumentos requerido para un evento.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="minimos-por-evento-GETapi-minimos-evento--evento_id---instrumento_tipo_id-">
                                <a href="#minimos-por-evento-GETapi-minimos-evento--evento_id---instrumento_tipo_id-">Mostrar mínimo

Obtiene el mínimo de instrumentos requerido para un evento específico.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="minimos-por-evento-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-">
                                <a href="#minimos-por-evento-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-">Actualizar mínimo

Actualiza la cantidad mínima requerida de un instrumento para un evento.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="minimos-por-evento-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-">
                                <a href="#minimos-por-evento-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-">Eliminar mínimo

Elimina el requerimiento mínimo de un instrumento para un evento.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-tipos-de-instrumentos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="tipos-de-instrumentos">
                    <a href="#tipos-de-instrumentos">Tipos de Instrumentos</a>
                </li>
                                    <ul id="tocify-subheader-tipos-de-instrumentos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="tipos-de-instrumentos-GETapi-tipo-instrumentos">
                                <a href="#tipos-de-instrumentos-GETapi-tipo-instrumentos">Listar tipos de instrumentos.

Obtiene una lista de todos los tipos de instrumentos registrados en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-instrumentos-POSTapi-tipo-instrumentos">
                                <a href="#tipos-de-instrumentos-POSTapi-tipo-instrumentos">Crear tipo de instrumento.

Crea un nuevo tipo de instrumento en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-instrumentos-GETapi-tipo-instrumentos--id-">
                                <a href="#tipos-de-instrumentos-GETapi-tipo-instrumentos--id-">Obtener tipo de instrumento.

Devuelve los detalles de un tipo de instrumento específico según su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-instrumentos-PUTapi-tipo-instrumentos--id-">
                                <a href="#tipos-de-instrumentos-PUTapi-tipo-instrumentos--id-">Actualizar tipo de instrumento.

Actualiza los datos de un tipo de instrumento existente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-instrumentos-DELETEapi-tipo-instrumentos--id-">
                                <a href="#tipos-de-instrumentos-DELETEapi-tipo-instrumentos--id-">Eliminar tipo de instrumento.

Elimina un tipo de instrumento del sistema.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-usuarios" class="tocify-header">
                <li class="tocify-item level-1" data-unique="usuarios">
                    <a href="#usuarios">Usuarios</a>
                </li>
                                    <ul id="tocify-subheader-usuarios" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="usuarios-POSTapi-mailTo">
                                <a href="#usuarios-POSTapi-mailTo">Enviar correo personalizado.

Envía un correo electrónico personalizado a un usuario.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-GETapi-usuarios">
                                <a href="#usuarios-GETapi-usuarios">Listar usuarios.

Obtiene una lista de todos los usuarios registrados en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-GETapi-usuarios--id-">
                                <a href="#usuarios-GETapi-usuarios--id-">Obtener un usuario.

Devuelve los detalles de un usuario específico según su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-PUTapi-usuarios--id-">
                                <a href="#usuarios-PUTapi-usuarios--id-">Actualizar usuario.

Actualiza los datos de un usuario existente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-DELETEapi-usuarios--id-">
                                <a href="#usuarios-DELETEapi-usuarios--id-">Eliminar usuario.

Elimina un usuario del sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-PATCHapi-usuarios--id--approve">
                                <a href="#usuarios-PATCHapi-usuarios--id--approve">Aprobar usuario.

Cambia el estado de un usuario a 'activo'.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="usuarios-PATCHapi-usuarios--id--block">
                                <a href="#usuarios-PATCHapi-usuarios--id--block">Bloquear usuario.

Cambia el estado de un usuario a 'bloqueado'.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 10, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="autenticacion">Autenticación</h1>

    

                                <h2 id="autenticacion-POSTapi-register">Registrar un nuevo usuario.

Este endpoint permite registrar un nuevo usuario. La cuenta quedará en estado &quot;pendiente&quot; hasta que un administrador la apruebe.</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"apellido1\": \"architecto\",
    \"apellido2\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"telefono\": \"architecto\",
    \"password\": \"|]|{+-\",
    \"fecha_nac\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "apellido1": "architecto",
    "apellido2": "architecto",
    "email": "gbailey@example.net",
    "telefono": "architecto",
    "password": "|]|{+-",
    "fecha_nac": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario registrado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-register"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>apellido1</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="apellido1"                data-endpoint="POSTapi-register"
               value="architecto"
               data-component="body">
    <br>
<p>Primer apellido del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>apellido2</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="apellido2"                data-endpoint="POSTapi-register"
               value="architecto"
               data-component="body">
    <br>
<p>Segundo apellido del usuario (opcional). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Correo electrónico válido y único. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>telefono</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="telefono"                data-endpoint="POSTapi-register"
               value="architecto"
               data-component="body">
    <br>
<p>Teléfono del usuario (opcional). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Contraseña del usuario. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_nac</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fecha_nac"                data-endpoint="POSTapi-register"
               value="architecto"
               data-component="body">
    <br>
<p>Fecha de nacimiento del usuario (opcional). Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="autenticacion-POSTapi-login">Iniciar sesión.

Permite iniciar sesión y obtener un token de autenticación.</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Inicio de sesi&oacute;n exitoso, se devuelve un token.</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Credenciales inv&aacute;lidas o cuenta pendiente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario no encontrado.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Correo electrónico del usuario. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Contraseña del usuario. Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="autenticacion-POSTapi-logout">POST api/logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Sesi&oacute;n cerrada correctamente.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="composiciones">Composiciones</h1>

    

                                <h2 id="composiciones-GETapi-composiciones">Listar todas las composiciones.

Devuelve una lista de todas las composiciones disponibles en el sistema.</h2>

<p>
</p>



<span id="example-requests-GETapi-composiciones">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-composiciones">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Lista de composiciones.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-composiciones" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-composiciones"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-composiciones"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-composiciones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-composiciones">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-composiciones" data-method="GET"
      data-path="api/composiciones"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-composiciones', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-composiciones"
                    onclick="tryItOut('GETapi-composiciones');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-composiciones"
                    onclick="cancelTryOut('GETapi-composiciones');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-composiciones"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/composiciones</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-composiciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-composiciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="composiciones-POSTapi-composiciones">POST api/composiciones</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-composiciones">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"descripcion\": \"architecto\",
    \"nombre_autor\": \"architecto\",
    \"iframe\": \"architecto\",
    \"files\": [
        \"architecto\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "descripcion": "architecto",
    "nombre_autor": "architecto",
    "iframe": "architecto",
    "files": [
        "architecto"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-composiciones">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n creada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al subir archivos.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-composiciones" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-composiciones"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-composiciones"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-composiciones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-composiciones">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-composiciones" data-method="POST"
      data-path="api/composiciones"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-composiciones', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-composiciones"
                    onclick="tryItOut('POSTapi-composiciones');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-composiciones"
                    onclick="cancelTryOut('POSTapi-composiciones');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-composiciones"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/composiciones</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-composiciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-composiciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-composiciones"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre de la composición. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="POSTapi-composiciones"
               value="architecto"
               data-component="body">
    <br>
<p>Descripción de la composición. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre_autor</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre_autor"                data-endpoint="POSTapi-composiciones"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del autor. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>iframe</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="iframe"                data-endpoint="POSTapi-composiciones"
               value="architecto"
               data-component="body">
    <br>
<p>Iframe del video relacionado. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>files</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="files[0]"                data-endpoint="POSTapi-composiciones"
               data-component="body">
        <input type="text" style="display: none"
               name="files[1]"                data-endpoint="POSTapi-composiciones"
               data-component="body">
    <br>
<p>Archivos relacionados (máximo 12).</p>
        </div>
        </form>

                    <h2 id="composiciones-GETapi-composiciones--id-">Obtener una composición.

Devuelve los detalles de una composición específica según su ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-composiciones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-composiciones--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n encontrada.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-composiciones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-composiciones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-composiciones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-composiciones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-composiciones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-composiciones--id-" data-method="GET"
      data-path="api/composiciones/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-composiciones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-composiciones--id-"
                    onclick="tryItOut('GETapi-composiciones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-composiciones--id-"
                    onclick="cancelTryOut('GETapi-composiciones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-composiciones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/composiciones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-composiciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-composiciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-composiciones--id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la composición a consultar. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="composiciones-PUTapi-composiciones--id-">PUT api/composiciones/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-composiciones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"descripcion\": \"architecto\",
    \"nombre_autor\": \"architecto\",
    \"iframe\": \"architecto\",
    \"files\": [
        \"architecto\"
    ],
    \"files_existentes\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "descripcion": "architecto",
    "nombre_autor": "architecto",
    "iframe": "architecto",
    "files": [
        "architecto"
    ],
    "files_existentes": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-composiciones--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n actualizada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al subir archivos.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-composiciones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-composiciones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-composiciones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-composiciones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-composiciones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-composiciones--id-" data-method="PUT"
      data-path="api/composiciones/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-composiciones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-composiciones--id-"
                    onclick="tryItOut('PUTapi-composiciones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-composiciones--id-"
                    onclick="cancelTryOut('PUTapi-composiciones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-composiciones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/composiciones/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/composiciones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-composiciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-composiciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-composiciones--id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la composición a actualizar. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="PUTapi-composiciones--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre de la composición. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="PUTapi-composiciones--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Descripción de la composición. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre_autor</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="nombre_autor"                data-endpoint="PUTapi-composiciones--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del autor. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>iframe</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="iframe"                data-endpoint="PUTapi-composiciones--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Iframe del video relacionado. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>files</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="files[0]"                data-endpoint="PUTapi-composiciones--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="files[1]"                data-endpoint="PUTapi-composiciones--id-"
               data-component="body">
    <br>
<p>Nuevos archivos para la composición (máximo 12).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>files_existentes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="files_existentes"                data-endpoint="PUTapi-composiciones--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Lista separada por punto y coma de archivos a conservar. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="composiciones-DELETEapi-composiciones--id-">DELETE api/composiciones/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-composiciones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composiciones/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-composiciones--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n eliminada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Composici&oacute;n no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-composiciones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-composiciones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-composiciones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-composiciones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-composiciones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-composiciones--id-" data-method="DELETE"
      data-path="api/composiciones/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-composiciones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-composiciones--id-"
                    onclick="tryItOut('DELETEapi-composiciones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-composiciones--id-"
                    onclick="cancelTryOut('DELETEapi-composiciones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-composiciones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/composiciones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-composiciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-composiciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-composiciones--id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la composición a eliminar. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="composicion-usuario">Composición-Usuario</h1>

    

                                <h2 id="composicion-usuario-GETapi-composicion-usuario">Listar todas las composiciones-usuario.

Devuelve todos los registros que relacionan composiciones con usuarios.</h2>

<p>
</p>



<span id="example-requests-GETapi-composicion-usuario">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-composicion-usuario">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Lista de relaciones composici&oacute;n-usuario.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-composicion-usuario" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-composicion-usuario"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-composicion-usuario"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-composicion-usuario" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-composicion-usuario">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-composicion-usuario" data-method="GET"
      data-path="api/composicion-usuario"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-composicion-usuario', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-composicion-usuario"
                    onclick="tryItOut('GETapi-composicion-usuario');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-composicion-usuario"
                    onclick="cancelTryOut('GETapi-composicion-usuario');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-composicion-usuario"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/composicion-usuario</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-composicion-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-composicion-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="composicion-usuario-POSTapi-composicion-usuario">POST api/composicion-usuario</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-composicion-usuario">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"composicion_id\": 16,
    \"usuario_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "composicion_id": 16,
    "usuario_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-composicion-usuario">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n creada exitosamente.</code>
 </pre>
            <blockquote>
            <p>Example response (409):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">La relaci&oacute;n ya existe.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-composicion-usuario" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-composicion-usuario"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-composicion-usuario"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-composicion-usuario" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-composicion-usuario">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-composicion-usuario" data-method="POST"
      data-path="api/composicion-usuario"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-composicion-usuario', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-composicion-usuario"
                    onclick="tryItOut('POSTapi-composicion-usuario');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-composicion-usuario"
                    onclick="cancelTryOut('POSTapi-composicion-usuario');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-composicion-usuario"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/composicion-usuario</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-composicion-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-composicion-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>composicion_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="composicion_id"                data-endpoint="POSTapi-composicion-usuario"
               value="16"
               data-component="body">
    <br>
<p>ID de la composición. Debe existir. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="POSTapi-composicion-usuario"
               value="16"
               data-component="body">
    <br>
<p>ID del usuario. Debe existir. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="composicion-usuario-GETapi-composicion-usuario--composicion_id---usuario_id-">Obtener una relación composición-usuario.

Devuelve un registro específico que relaciona una composición con un usuario.</h2>

<p>
</p>



<span id="example-requests-GETapi-composicion-usuario--composicion_id---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario/16/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario/16/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-composicion-usuario--composicion_id---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n encontrada.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-composicion-usuario--composicion_id---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-composicion-usuario--composicion_id---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-composicion-usuario--composicion_id---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-composicion-usuario--composicion_id---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-composicion-usuario--composicion_id---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-composicion-usuario--composicion_id---usuario_id-" data-method="GET"
      data-path="api/composicion-usuario/{composicion_id}/{usuario_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-composicion-usuario--composicion_id---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-composicion-usuario--composicion_id---usuario_id-"
                    onclick="tryItOut('GETapi-composicion-usuario--composicion_id---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-composicion-usuario--composicion_id---usuario_id-"
                    onclick="cancelTryOut('GETapi-composicion-usuario--composicion_id---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-composicion-usuario--composicion_id---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/composicion-usuario/{composicion_id}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-composicion-usuario--composicion_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-composicion-usuario--composicion_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>composicion_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="composicion_id"                data-endpoint="GETapi-composicion-usuario--composicion_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la composición. Example: <code>16</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="GETapi-composicion-usuario--composicion_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="composicion-usuario-DELETEapi-composicion-usuario--composicion_id---usuario_id-">DELETE api/composicion-usuario/{composicion_id}/{usuario_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-composicion-usuario--composicion_id---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario/16/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/composicion-usuario/16/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-composicion-usuario--composicion_id---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n eliminada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-composicion-usuario--composicion_id---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-composicion-usuario--composicion_id---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-composicion-usuario--composicion_id---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-composicion-usuario--composicion_id---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-composicion-usuario--composicion_id---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-composicion-usuario--composicion_id---usuario_id-" data-method="DELETE"
      data-path="api/composicion-usuario/{composicion_id}/{usuario_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-composicion-usuario--composicion_id---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-composicion-usuario--composicion_id---usuario_id-"
                    onclick="tryItOut('DELETEapi-composicion-usuario--composicion_id---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-composicion-usuario--composicion_id---usuario_id-"
                    onclick="cancelTryOut('DELETEapi-composicion-usuario--composicion_id---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-composicion-usuario--composicion_id---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/composicion-usuario/{composicion_id}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-composicion-usuario--composicion_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-composicion-usuario--composicion_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>composicion_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="composicion_id"                data-endpoint="DELETEapi-composicion-usuario--composicion_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la composición. Example: <code>16</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="DELETEapi-composicion-usuario--composicion_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-prestamos">Listar todos los préstamos.</h2>

<p>
</p>

<p>Devuelve todos los préstamos de instrumentos registrados en el sistema.</p>

<span id="example-requests-GETapi-prestamos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-prestamos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Lista de pr&eacute;stamos obtenida correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener los pr&eacute;stamos.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-prestamos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-prestamos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-prestamos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-prestamos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-prestamos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-prestamos" data-method="GET"
      data-path="api/prestamos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-prestamos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-prestamos"
                    onclick="tryItOut('GETapi-prestamos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-prestamos"
                    onclick="cancelTryOut('GETapi-prestamos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-prestamos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/prestamos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-prestamos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-prestamos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-prestamos">Crear nuevo préstamo.</h2>

<p>
</p>

<p>Registra un nuevo préstamo de instrumento en el sistema.</p>

<span id="example-requests-POSTapi-prestamos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"num_serie\": \"architecto\",
    \"usuario_id\": 16,
    \"fecha_prestamo\": \"architecto\",
    \"fecha_devolucion\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "num_serie": "architecto",
    "usuario_id": 16,
    "fecha_prestamo": "architecto",
    "fecha_devolucion": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-prestamos">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo creado exitosamente.</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">El instrumento no est&aacute; disponible.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n en los datos.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear el pr&eacute;stamo.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-prestamos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-prestamos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-prestamos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-prestamos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-prestamos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-prestamos" data-method="POST"
      data-path="api/prestamos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-prestamos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-prestamos"
                    onclick="tryItOut('POSTapi-prestamos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-prestamos"
                    onclick="cancelTryOut('POSTapi-prestamos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-prestamos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/prestamos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-prestamos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-prestamos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>num_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="num_serie"                data-endpoint="POSTapi-prestamos"
               value="architecto"
               data-component="body">
    <br>
<p>El número de serie del instrumento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="POSTapi-prestamos"
               value="16"
               data-component="body">
    <br>
<p>El ID del usuario que solicita el préstamo. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_prestamo</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_prestamo"                data-endpoint="POSTapi-prestamos"
               value="architecto"
               data-component="body">
    <br>
<p>La fecha del préstamo (formato Y-m-d). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_devolucion</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fecha_devolucion"                data-endpoint="POSTapi-prestamos"
               value="architecto"
               data-component="body">
    <br>
<p>La fecha de devolución prevista (formato Y-m-d). Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-prestamos--num_serie---usuario_id-">Obtener un préstamo específico.</h2>

<p>
</p>

<p>Devuelve la información detallada de un préstamo específico.</p>

<span id="example-requests-GETapi-prestamos--num_serie---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos/architecto/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos/architecto/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-prestamos--num_serie---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener el pr&eacute;stamo.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-prestamos--num_serie---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-prestamos--num_serie---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-prestamos--num_serie---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-prestamos--num_serie---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-prestamos--num_serie---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-prestamos--num_serie---usuario_id-" data-method="GET"
      data-path="api/prestamos/{num_serie}/{usuario_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-prestamos--num_serie---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-prestamos--num_serie---usuario_id-"
                    onclick="tryItOut('GETapi-prestamos--num_serie---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-prestamos--num_serie---usuario_id-"
                    onclick="cancelTryOut('GETapi-prestamos--num_serie---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-prestamos--num_serie---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/prestamos/{num_serie}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-prestamos--num_serie---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-prestamos--num_serie---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>num_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="num_serie"                data-endpoint="GETapi-prestamos--num_serie---usuario_id-"
               value="architecto"
               data-component="url">
    <br>
<p>El número de serie del instrumento. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="GETapi-prestamos--num_serie---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>El ID del usuario. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-prestamos--num_serie---usuario_id-">Actualizar préstamo.</h2>

<p>
</p>

<p>Actualiza las fechas de un préstamo existente.</p>

<span id="example-requests-PUTapi-prestamos--num_serie---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos/architecto/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"fecha_prestamo\": \"architecto\",
    \"fecha_devolucion\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos/architecto/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "fecha_prestamo": "architecto",
    "fecha_devolucion": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-prestamos--num_serie---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n en las fechas.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al actualizar el pr&eacute;stamo.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-prestamos--num_serie---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-prestamos--num_serie---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-prestamos--num_serie---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-prestamos--num_serie---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-prestamos--num_serie---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-prestamos--num_serie---usuario_id-" data-method="PUT"
      data-path="api/prestamos/{num_serie}/{usuario_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-prestamos--num_serie---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-prestamos--num_serie---usuario_id-"
                    onclick="tryItOut('PUTapi-prestamos--num_serie---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-prestamos--num_serie---usuario_id-"
                    onclick="cancelTryOut('PUTapi-prestamos--num_serie---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-prestamos--num_serie---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/prestamos/{num_serie}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-prestamos--num_serie---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-prestamos--num_serie---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>num_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="num_serie"                data-endpoint="PUTapi-prestamos--num_serie---usuario_id-"
               value="architecto"
               data-component="url">
    <br>
<p>El número de serie del instrumento. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="PUTapi-prestamos--num_serie---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>El ID del usuario. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_prestamo</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_prestamo"                data-endpoint="PUTapi-prestamos--num_serie---usuario_id-"
               value="architecto"
               data-component="body">
    <br>
<p>La nueva fecha de préstamo (formato Y-m-d). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_devolucion</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_devolucion"                data-endpoint="PUTapi-prestamos--num_serie---usuario_id-"
               value="architecto"
               data-component="body">
    <br>
<p>La nueva fecha de devolución (formato Y-m-d). Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-prestamos--num_serie---usuario_id-">Eliminar préstamo.</h2>

<p>
</p>

<p>Elimina un registro de préstamo del sistema.</p>

<span id="example-requests-DELETEapi-prestamos--num_serie---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos/architecto/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/prestamos/architecto/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-prestamos--num_serie---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Pr&eacute;stamo no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el pr&eacute;stamo.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-prestamos--num_serie---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-prestamos--num_serie---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-prestamos--num_serie---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-prestamos--num_serie---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-prestamos--num_serie---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-prestamos--num_serie---usuario_id-" data-method="DELETE"
      data-path="api/prestamos/{num_serie}/{usuario_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-prestamos--num_serie---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-prestamos--num_serie---usuario_id-"
                    onclick="tryItOut('DELETEapi-prestamos--num_serie---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-prestamos--num_serie---usuario_id-"
                    onclick="cancelTryOut('DELETEapi-prestamos--num_serie---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-prestamos--num_serie---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/prestamos/{num_serie}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-prestamos--num_serie---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-prestamos--num_serie---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>num_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="num_serie"                data-endpoint="DELETEapi-prestamos--num_serie---usuario_id-"
               value="architecto"
               data-component="url">
    <br>
<p>El número de serie del instrumento. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="DELETEapi-prestamos--num_serie---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>El ID del usuario. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="entidades">Entidades</h1>

    

                                <h2 id="entidades-GETapi-entidades">Listar todas las entidades.

Devuelve una lista con todas las entidades registradas en el sistema.</h2>

<p>
</p>



<span id="example-requests-GETapi-entidades">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-entidades">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Lista de entidades obtenida correctamente.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-entidades" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-entidades"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-entidades"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-entidades" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-entidades">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-entidades" data-method="GET"
      data-path="api/entidades"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-entidades', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-entidades"
                    onclick="tryItOut('GETapi-entidades');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-entidades"
                    onclick="cancelTryOut('GETapi-entidades');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-entidades"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/entidades</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-entidades"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-entidades"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="entidades-POSTapi-entidades">POST api/entidades</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-entidades">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"tipo\": \"architecto\",
    \"persona_contacto\": \"architecto\",
    \"telefono\": \"architecto\",
    \"email_contacto\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "tipo": "architecto",
    "persona_contacto": "architecto",
    "telefono": "architecto",
    "email_contacto": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-entidades">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad creada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-entidades" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-entidades"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-entidades"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-entidades" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-entidades">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-entidades" data-method="POST"
      data-path="api/entidades"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-entidades', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-entidades"
                    onclick="tryItOut('POSTapi-entidades');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-entidades"
                    onclick="cancelTryOut('POSTapi-entidades');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-entidades"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/entidades</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-entidades"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-entidades"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-entidades"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre de la entidad. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tipo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tipo"                data-endpoint="POSTapi-entidades"
               value="architecto"
               data-component="body">
    <br>
<p>Tipo de entidad. Debe ser uno de: hermandad, ayuntamiento, otro. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>persona_contacto</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="persona_contacto"                data-endpoint="POSTapi-entidades"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre de la persona de contacto. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>telefono</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="telefono"                data-endpoint="POSTapi-entidades"
               value="architecto"
               data-component="body">
    <br>
<p>Teléfono de contacto. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email_contacto</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email_contacto"                data-endpoint="POSTapi-entidades"
               value="architecto"
               data-component="body">
    <br>
<p>Correo electrónico de contacto. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="entidades-GETapi-entidades--id-">Obtener una entidad específica.

Recupera una entidad a partir de su ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-entidades--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-entidades--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad encontrada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-entidades--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-entidades--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-entidades--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-entidades--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-entidades--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-entidades--id-" data-method="GET"
      data-path="api/entidades/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-entidades--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-entidades--id-"
                    onclick="tryItOut('GETapi-entidades--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-entidades--id-"
                    onclick="cancelTryOut('GETapi-entidades--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-entidades--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/entidades/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-entidades--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-entidades--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-entidades--id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la entidad. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="entidades-PUTapi-entidades--id-">PUT api/entidades/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-entidades--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"tipo\": \"architecto\",
    \"persona_contacto\": \"architecto\",
    \"telefono\": \"architecto\",
    \"email_contacto\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "tipo": "architecto",
    "persona_contacto": "architecto",
    "telefono": "architecto",
    "email_contacto": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-entidades--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad actualizada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad no encontrada.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-entidades--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-entidades--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-entidades--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-entidades--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-entidades--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-entidades--id-" data-method="PUT"
      data-path="api/entidades/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-entidades--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-entidades--id-"
                    onclick="tryItOut('PUTapi-entidades--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-entidades--id-"
                    onclick="cancelTryOut('PUTapi-entidades--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-entidades--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/entidades/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/entidades/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-entidades--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-entidades--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-entidades--id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la entidad. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="PUTapi-entidades--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre de la entidad. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tipo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="tipo"                data-endpoint="PUTapi-entidades--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Tipo de entidad. Debe ser uno de: hermandad, ayuntamiento, otro. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>persona_contacto</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="persona_contacto"                data-endpoint="PUTapi-entidades--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre de la persona de contacto. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>telefono</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="telefono"                data-endpoint="PUTapi-entidades--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Teléfono de contacto. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email_contacto</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email_contacto"                data-endpoint="PUTapi-entidades--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Correo electrónico de contacto. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="entidades-DELETEapi-entidades--id-">DELETE api/entidades/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-entidades--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/entidades/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-entidades--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad eliminada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Entidad no encontrada.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-entidades--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-entidades--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-entidades--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-entidades--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-entidades--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-entidades--id-" data-method="DELETE"
      data-path="api/entidades/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-entidades--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-entidades--id-"
                    onclick="tryItOut('DELETEapi-entidades--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-entidades--id-"
                    onclick="cancelTryOut('DELETEapi-entidades--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-entidades--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/entidades/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-entidades--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-entidades--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-entidades--id-"
               value="16"
               data-component="url">
    <br>
<p>ID de la entidad. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="evento-usuario">Evento Usuario</h1>

    

                                <h2 id="evento-usuario-GETapi-evento-usuario">Listar todos los eventos de usuarios.

Obtiene un listado completo de todas las relaciones evento-usuario.</h2>

<p>
</p>



<span id="example-requests-GETapi-evento-usuario">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-evento-usuario">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Listado de eventos por usuario obtenido correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener los eventos de usuarios.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-evento-usuario" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-evento-usuario"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-evento-usuario"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-evento-usuario" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-evento-usuario">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-evento-usuario" data-method="GET"
      data-path="api/evento-usuario"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-evento-usuario', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-evento-usuario"
                    onclick="tryItOut('GETapi-evento-usuario');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-evento-usuario"
                    onclick="cancelTryOut('GETapi-evento-usuario');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-evento-usuario"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/evento-usuario</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-evento-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-evento-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="evento-usuario-POSTapi-evento-usuario">POST api/evento-usuario</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-evento-usuario">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"evento_id\": 16,
    \"usuario_id\": 16,
    \"confirmacion\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "evento_id": 16,
    "usuario_id": 16,
    "confirmacion": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-evento-usuario">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento de usuario creado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">El usuario ya est&aacute; registrado para este evento.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear el evento usuario.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-evento-usuario" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-evento-usuario"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-evento-usuario"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-evento-usuario" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-evento-usuario">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-evento-usuario" data-method="POST"
      data-path="api/evento-usuario"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-evento-usuario', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-evento-usuario"
                    onclick="tryItOut('POSTapi-evento-usuario');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-evento-usuario"
                    onclick="cancelTryOut('POSTapi-evento-usuario');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-evento-usuario"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/evento-usuario</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-evento-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-evento-usuario"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="POSTapi-evento-usuario"
               value="16"
               data-component="body">
    <br>
<p>ID del evento. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="POSTapi-evento-usuario"
               value="16"
               data-component="body">
    <br>
<p>ID del usuario. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>confirmacion</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-evento-usuario" style="display: none">
            <input type="radio" name="confirmacion"
                   value="true"
                   data-endpoint="POSTapi-evento-usuario"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-evento-usuario" style="display: none">
            <input type="radio" name="confirmacion"
                   value="false"
                   data-endpoint="POSTapi-evento-usuario"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Opcional. Confirmación de asistencia. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="evento-usuario-GETapi-evento-usuario--evento_id---usuario_id-">Obtener un evento_usuario específico.

Devuelve la relación entre un evento y un usuario específica.</h2>

<p>
</p>



<span id="example-requests-GETapi-evento-usuario--evento_id---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario/16/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario/16/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-evento-usuario--evento_id---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento usuario obtenido correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento usuario no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener el evento usuario.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-evento-usuario--evento_id---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-evento-usuario--evento_id---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-evento-usuario--evento_id---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-evento-usuario--evento_id---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-evento-usuario--evento_id---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-evento-usuario--evento_id---usuario_id-" data-method="GET"
      data-path="api/evento-usuario/{evento_id}/{usuario_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-evento-usuario--evento_id---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-evento-usuario--evento_id---usuario_id-"
                    onclick="tryItOut('GETapi-evento-usuario--evento_id---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-evento-usuario--evento_id---usuario_id-"
                    onclick="cancelTryOut('GETapi-evento-usuario--evento_id---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-evento-usuario--evento_id---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/evento-usuario/{evento_id}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-evento-usuario--evento_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-evento-usuario--evento_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="GETapi-evento-usuario--evento_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>16</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="GETapi-evento-usuario--evento_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="evento-usuario-PUTapi-evento-usuario--evento_id---usuario_id-">PUT api/evento-usuario/{evento_id}/{usuario_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-evento-usuario--evento_id---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario/16/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"confirmacion\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario/16/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "confirmacion": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-evento-usuario--evento_id---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Confirmaci&oacute;n actualizada correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">No se encontr&oacute; el registro para actualizar.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al actualizar la confirmaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-evento-usuario--evento_id---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-evento-usuario--evento_id---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-evento-usuario--evento_id---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-evento-usuario--evento_id---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-evento-usuario--evento_id---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-evento-usuario--evento_id---usuario_id-" data-method="PUT"
      data-path="api/evento-usuario/{evento_id}/{usuario_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-evento-usuario--evento_id---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-evento-usuario--evento_id---usuario_id-"
                    onclick="tryItOut('PUTapi-evento-usuario--evento_id---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-evento-usuario--evento_id---usuario_id-"
                    onclick="cancelTryOut('PUTapi-evento-usuario--evento_id---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-evento-usuario--evento_id---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/evento-usuario/{evento_id}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>16</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>confirmacion</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-" style="display: none">
            <input type="radio" name="confirmacion"
                   value="true"
                   data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-" style="display: none">
            <input type="radio" name="confirmacion"
                   value="false"
                   data-endpoint="PUTapi-evento-usuario--evento_id---usuario_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Nuevo estado de confirmación. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="evento-usuario-DELETEapi-evento-usuario--evento_id---usuario_id-">DELETE api/evento-usuario/{evento_id}/{usuario_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-evento-usuario--evento_id---usuario_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario/16/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/evento-usuario/16/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-evento-usuario--evento_id---usuario_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Registro eliminado correctamente.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No se encontr&oacute; el registro para eliminar.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;error&quot;: &quot;Error al eliminar el registro.&quot;,
    &quot;message&quot;: &quot;Mensaje de error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-evento-usuario--evento_id---usuario_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-evento-usuario--evento_id---usuario_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-evento-usuario--evento_id---usuario_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-evento-usuario--evento_id---usuario_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-evento-usuario--evento_id---usuario_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-evento-usuario--evento_id---usuario_id-" data-method="DELETE"
      data-path="api/evento-usuario/{evento_id}/{usuario_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-evento-usuario--evento_id---usuario_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-evento-usuario--evento_id---usuario_id-"
                    onclick="tryItOut('DELETEapi-evento-usuario--evento_id---usuario_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-evento-usuario--evento_id---usuario_id-"
                    onclick="cancelTryOut('DELETEapi-evento-usuario--evento_id---usuario_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-evento-usuario--evento_id---usuario_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/evento-usuario/{evento_id}/{usuario_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-evento-usuario--evento_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-evento-usuario--evento_id---usuario_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="DELETEapi-evento-usuario--evento_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>16</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="DELETEapi-evento-usuario--evento_id---usuario_id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="eventos">Eventos</h1>

    

                                <h2 id="eventos-GETapi-eventos">Listar todos los eventos.

Devuelve un listado completo con todos los eventos registrados.</h2>

<p>
</p>



<span id="example-requests-GETapi-eventos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-eventos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Eventos obtenidos correctamente.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-eventos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-eventos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-eventos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-eventos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-eventos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-eventos" data-method="GET"
      data-path="api/eventos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-eventos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-eventos"
                    onclick="tryItOut('GETapi-eventos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-eventos"
                    onclick="cancelTryOut('GETapi-eventos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-eventos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/eventos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-eventos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-eventos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="eventos-POSTapi-eventos">POST api/eventos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-eventos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"fecha\": \"architecto\",
    \"lugar\": \"architecto\",
    \"hora\": \"architecto\",
    \"estado\": \"architecto\",
    \"tipo\": \"architecto\",
    \"entidad_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "fecha": "architecto",
    "lugar": "architecto",
    "hora": "architecto",
    "estado": "architecto",
    "tipo": "architecto",
    "entidad_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-eventos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento creado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-eventos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-eventos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-eventos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-eventos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-eventos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-eventos" data-method="POST"
      data-path="api/eventos"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-eventos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-eventos"
                    onclick="tryItOut('POSTapi-eventos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-eventos"
                    onclick="cancelTryOut('POSTapi-eventos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-eventos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/eventos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-eventos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-eventos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-eventos"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del evento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha"                data-endpoint="POSTapi-eventos"
               value="architecto"
               data-component="body">
    <br>
<p>Fecha del evento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lugar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="lugar"                data-endpoint="POSTapi-eventos"
               value="architecto"
               data-component="body">
    <br>
<p>Lugar donde se realizará el evento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hora</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hora"                data-endpoint="POSTapi-eventos"
               value="architecto"
               data-component="body">
    <br>
<p>Hora del evento en formato HH:mm. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="estado"                data-endpoint="POSTapi-eventos"
               value="architecto"
               data-component="body">
    <br>
<p>Estado del evento. Valores permitidos: planificado, en progreso, finalizado. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tipo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tipo"                data-endpoint="POSTapi-eventos"
               value="architecto"
               data-component="body">
    <br>
<p>Tipo de evento. Valores permitidos: ensayo, procesion, concierto, pasacalles. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>entidad_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="entidad_id"                data-endpoint="POSTapi-eventos"
               value="16"
               data-component="body">
    <br>
<p>ID de la entidad organizadora. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="eventos-GETapi-eventos--id-">Obtener un evento específico.

Devuelve la información detallada de un evento según su ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-eventos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-eventos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento obtenido correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento no encontrado.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-eventos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-eventos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-eventos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-eventos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-eventos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-eventos--id-" data-method="GET"
      data-path="api/eventos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-eventos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-eventos--id-"
                    onclick="tryItOut('GETapi-eventos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-eventos--id-"
                    onclick="cancelTryOut('GETapi-eventos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-eventos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/eventos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-eventos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-eventos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-eventos--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="eventos-PUTapi-eventos--id-">PUT api/eventos/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-eventos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"fecha\": \"architecto\",
    \"lugar\": \"architecto\",
    \"hora\": \"architecto\",
    \"estado\": \"architecto\",
    \"tipo\": \"architecto\",
    \"entidad_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "fecha": "architecto",
    "lugar": "architecto",
    "hora": "architecto",
    "estado": "architecto",
    "tipo": "architecto",
    "entidad_id": 16
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-eventos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-eventos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-eventos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-eventos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-eventos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-eventos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-eventos--id-" data-method="PUT"
      data-path="api/eventos/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-eventos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-eventos--id-"
                    onclick="tryItOut('PUTapi-eventos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-eventos--id-"
                    onclick="cancelTryOut('PUTapi-eventos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-eventos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/eventos/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/eventos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-eventos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-eventos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-eventos--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="PUTapi-eventos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del evento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fecha"                data-endpoint="PUTapi-eventos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Fecha del evento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lugar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="lugar"                data-endpoint="PUTapi-eventos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Lugar del evento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hora</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="hora"                data-endpoint="PUTapi-eventos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Hora del evento en formato HH:mm. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="estado"                data-endpoint="PUTapi-eventos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Estado del evento. Valores permitidos: planificado, en progreso, finalizado. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tipo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="tipo"                data-endpoint="PUTapi-eventos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Tipo de evento. Valores permitidos: ensayo, procesion, concierto, pasacalles. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>entidad_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="entidad_id"                data-endpoint="PUTapi-eventos--id-"
               value="16"
               data-component="body">
    <br>
<p>ID de la entidad organizadora. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="eventos-DELETEapi-eventos--id-">DELETE api/eventos/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-eventos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/eventos/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-eventos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Evento no encontrado.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-eventos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-eventos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-eventos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-eventos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-eventos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-eventos--id-" data-method="DELETE"
      data-path="api/eventos/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-eventos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-eventos--id-"
                    onclick="tryItOut('DELETEapi-eventos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-eventos--id-"
                    onclick="cancelTryOut('DELETEapi-eventos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-eventos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/eventos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-eventos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-eventos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-eventos--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="instrumentos">Instrumentos</h1>

    

                                <h2 id="instrumentos-GETapi-instrumentos">Listar instrumentos

Obtiene un listado de todos los instrumentos registrados en el sistema.</h2>

<p>
</p>



<span id="example-requests-GETapi-instrumentos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-instrumentos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Lista de instrumentos obtenida correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener la lista de instrumentos.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-instrumentos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-instrumentos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-instrumentos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-instrumentos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-instrumentos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-instrumentos" data-method="GET"
      data-path="api/instrumentos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-instrumentos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-instrumentos"
                    onclick="tryItOut('GETapi-instrumentos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-instrumentos"
                    onclick="cancelTryOut('GETapi-instrumentos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-instrumentos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/instrumentos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="instrumentos-POSTapi-instrumentos">Crear instrumento

Registra un nuevo instrumento en el sistema.</h2>

<p>
</p>



<span id="example-requests-POSTapi-instrumentos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"numero_serie\": \"123ABC\",
    \"estado\": \"disponible\",
    \"instrumento_tipo_id\": \"Trompeta\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "numero_serie": "123ABC",
    "estado": "disponible",
    "instrumento_tipo_id": "Trompeta"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-instrumentos">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento creado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear el instrumento.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-instrumentos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-instrumentos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-instrumentos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-instrumentos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-instrumentos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-instrumentos" data-method="POST"
      data-path="api/instrumentos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-instrumentos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-instrumentos"
                    onclick="tryItOut('POSTapi-instrumentos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-instrumentos"
                    onclick="cancelTryOut('POSTapi-instrumentos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-instrumentos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/instrumentos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>numero_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="numero_serie"                data-endpoint="POSTapi-instrumentos"
               value="123ABC"
               data-component="body">
    <br>
<p>Número de serie único del instrumento. Example: <code>123ABC</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="estado"                data-endpoint="POSTapi-instrumentos"
               value="disponible"
               data-component="body">
    <br>
<p>Estado del instrumento (prestado/disponible/en reparacion). Example: <code>disponible</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrumento_tipo_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento_tipo_id"                data-endpoint="POSTapi-instrumentos"
               value="Trompeta"
               data-component="body">
    <br>
<p>Tipo de instrumento. Debe ser uno de: Trompeta, Fliscorno, Trombon, Bombardino, Tuba, Corneta, Caja, Tambor, other. Example: <code>Trompeta</code></p>
        </div>
        </form>

                    <h2 id="instrumentos-GETapi-instrumentos--id-">Mostrar instrumento

Obtiene los detalles de un instrumento específico por su número de serie.</h2>

<p>
</p>



<span id="example-requests-GETapi-instrumentos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-instrumentos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento obtenido correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al buscar el instrumento.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-instrumentos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-instrumentos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-instrumentos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-instrumentos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-instrumentos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-instrumentos--id-" data-method="GET"
      data-path="api/instrumentos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-instrumentos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-instrumentos--id-"
                    onclick="tryItOut('GETapi-instrumentos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-instrumentos--id-"
                    onclick="cancelTryOut('GETapi-instrumentos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-instrumentos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/instrumentos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-instrumentos--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the instrumento. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>numero_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="numero_serie"                data-endpoint="GETapi-instrumentos--id-"
               value="123ABC"
               data-component="url">
    <br>
<p>El número de serie del instrumento. Example: <code>123ABC</code></p>
            </div>
                    </form>

                    <h2 id="instrumentos-PUTapi-instrumentos--id-">Actualizar instrumento

Actualiza la información de un instrumento existente.</h2>

<p>
</p>



<span id="example-requests-PUTapi-instrumentos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"estado\": \"prestado\",
    \"instrumento_tipo_id\": \"Trompeta\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "estado": "prestado",
    "instrumento_tipo_id": "Trompeta"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-instrumentos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-instrumentos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-instrumentos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-instrumentos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-instrumentos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-instrumentos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-instrumentos--id-" data-method="PUT"
      data-path="api/instrumentos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-instrumentos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-instrumentos--id-"
                    onclick="tryItOut('PUTapi-instrumentos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-instrumentos--id-"
                    onclick="cancelTryOut('PUTapi-instrumentos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-instrumentos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/instrumentos/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/instrumentos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-instrumentos--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the instrumento. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>numero_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="numero_serie"                data-endpoint="PUTapi-instrumentos--id-"
               value="123ABC"
               data-component="url">
    <br>
<p>Número de serie del instrumento a actualizar. Example: <code>123ABC</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="estado"                data-endpoint="PUTapi-instrumentos--id-"
               value="prestado"
               data-component="body">
    <br>
<p>Nuevo estado del instrumento. Example: <code>prestado</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrumento_tipo_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento_tipo_id"                data-endpoint="PUTapi-instrumentos--id-"
               value="Trompeta"
               data-component="body">
    <br>
<p>Nuevo tipo de instrumento. Example: <code>Trompeta</code></p>
        </div>
        </form>

                    <h2 id="instrumentos-DELETEapi-instrumentos--id-">Eliminar instrumento

Elimina un instrumento del sistema.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-instrumentos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/instrumentos/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-instrumentos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el instrumento.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-instrumentos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-instrumentos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-instrumentos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-instrumentos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-instrumentos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-instrumentos--id-" data-method="DELETE"
      data-path="api/instrumentos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-instrumentos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-instrumentos--id-"
                    onclick="tryItOut('DELETEapi-instrumentos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-instrumentos--id-"
                    onclick="cancelTryOut('DELETEapi-instrumentos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-instrumentos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/instrumentos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-instrumentos--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the instrumento. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>numero_serie</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="numero_serie"                data-endpoint="DELETEapi-instrumentos--id-"
               value="123ABC"
               data-component="url">
    <br>
<p>Número de serie del instrumento a eliminar. Example: <code>123ABC</code></p>
            </div>
                    </form>

                <h1 id="mensajes">Mensajes</h1>

    

                                <h2 id="mensajes-GETapi-mensajes">Listar mensajes

Obtiene un listado de todos los mensajes con información del emisor.</h2>

<p>
</p>



<span id="example-requests-GETapi-mensajes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mensajes">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensajes obtenidos correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener los mensajes.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mensajes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mensajes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mensajes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mensajes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mensajes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mensajes" data-method="GET"
      data-path="api/mensajes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mensajes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mensajes"
                    onclick="tryItOut('GETapi-mensajes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mensajes"
                    onclick="cancelTryOut('GETapi-mensajes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mensajes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mensajes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mensajes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mensajes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="mensajes-POSTapi-mensajes">Crear mensaje

Crea un nuevo mensaje en el sistema.</h2>

<p>
</p>



<span id="example-requests-POSTapi-mensajes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"asunto\": \"Reunión importante\",
    \"contenido\": \"El ensayo será a las 18:00\",
    \"usuario_id_emisor\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "asunto": "Reunión importante",
    "contenido": "El ensayo será a las 18:00",
    "usuario_id_emisor": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-mensajes">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje creado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear el mensaje.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-mensajes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-mensajes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mensajes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mensajes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mensajes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mensajes" data-method="POST"
      data-path="api/mensajes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mensajes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mensajes"
                    onclick="tryItOut('POSTapi-mensajes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mensajes"
                    onclick="cancelTryOut('POSTapi-mensajes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mensajes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mensajes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mensajes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mensajes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>asunto</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="asunto"                data-endpoint="POSTapi-mensajes"
               value="Reunión importante"
               data-component="body">
    <br>
<p>Asunto del mensaje. Example: <code>Reunión importante</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contenido</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contenido"                data-endpoint="POSTapi-mensajes"
               value="El ensayo será a las 18:00"
               data-component="body">
    <br>
<p>Contenido del mensaje. Example: <code>El ensayo será a las 18:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usuario_id_emisor</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id_emisor"                data-endpoint="POSTapi-mensajes"
               value="1"
               data-component="body">
    <br>
<p>ID del usuario que envía el mensaje. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="mensajes-GETapi-mensajes--id-">Mostrar mensaje

Obtiene los detalles de un mensaje específico incluyendo información del emisor.</h2>

<p>
</p>



<span id="example-requests-GETapi-mensajes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mensajes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje obtenido correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener el mensaje.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mensajes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mensajes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mensajes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mensajes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mensajes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mensajes--id-" data-method="GET"
      data-path="api/mensajes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mensajes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mensajes--id-"
                    onclick="tryItOut('GETapi-mensajes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mensajes--id-"
                    onclick="cancelTryOut('GETapi-mensajes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mensajes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mensajes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mensajes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mensajes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-mensajes--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del mensaje. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="mensajes-PUTapi-mensajes--id-">Actualizar mensaje

Actualiza un mensaje existente.</h2>

<p>
</p>



<span id="example-requests-PUTapi-mensajes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"asunto\": \"Reunión importante actualizada\",
    \"contenido\": \"El ensayo será a las 19:00\",
    \"usuario_id_emisor\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "asunto": "Reunión importante actualizada",
    "contenido": "El ensayo será a las 19:00",
    "usuario_id_emisor": 1
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-mensajes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-mensajes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-mensajes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mensajes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-mensajes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mensajes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-mensajes--id-" data-method="PUT"
      data-path="api/mensajes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-mensajes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-mensajes--id-"
                    onclick="tryItOut('PUTapi-mensajes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-mensajes--id-"
                    onclick="cancelTryOut('PUTapi-mensajes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-mensajes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/mensajes/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/mensajes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-mensajes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-mensajes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-mensajes--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del mensaje a actualizar. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>asunto</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="asunto"                data-endpoint="PUTapi-mensajes--id-"
               value="Reunión importante actualizada"
               data-component="body">
    <br>
<p>Asunto del mensaje. Example: <code>Reunión importante actualizada</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contenido</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="contenido"                data-endpoint="PUTapi-mensajes--id-"
               value="El ensayo será a las 19:00"
               data-component="body">
    <br>
<p>Contenido del mensaje. Example: <code>El ensayo será a las 19:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usuario_id_emisor</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id_emisor"                data-endpoint="PUTapi-mensajes--id-"
               value="1"
               data-component="body">
    <br>
<p>ID del usuario que envía el mensaje. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="mensajes-DELETEapi-mensajes--id-">Eliminar mensaje

Elimina un mensaje del sistema.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-mensajes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensajes/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-mensajes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Mensaje no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el mensaje.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-mensajes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-mensajes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mensajes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-mensajes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mensajes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-mensajes--id-" data-method="DELETE"
      data-path="api/mensajes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mensajes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-mensajes--id-"
                    onclick="tryItOut('DELETEapi-mensajes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-mensajes--id-"
                    onclick="cancelTryOut('DELETEapi-mensajes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-mensajes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/mensajes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-mensajes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-mensajes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-mensajes--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del mensaje a eliminar. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="mensajes-usuarios">Mensajes-Usuarios</h1>

    

                                <h2 id="mensajes-usuarios-GETapi-mensaje-usuarios">Listar relaciones

Obtiene todas las relaciones entre mensajes y usuarios.</h2>

<p>
</p>



<span id="example-requests-GETapi-mensaje-usuarios">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mensaje-usuarios">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaciones listadas exitosamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al listar relaciones.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mensaje-usuarios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mensaje-usuarios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mensaje-usuarios"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mensaje-usuarios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mensaje-usuarios">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mensaje-usuarios" data-method="GET"
      data-path="api/mensaje-usuarios"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mensaje-usuarios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mensaje-usuarios"
                    onclick="tryItOut('GETapi-mensaje-usuarios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mensaje-usuarios"
                    onclick="cancelTryOut('GETapi-mensaje-usuarios');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mensaje-usuarios"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mensaje-usuarios</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mensaje-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mensaje-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="mensajes-usuarios-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">Mostrar relación

Obtiene una relación específica entre mensaje y usuario.</h2>

<p>
</p>



<span id="example-requests-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios/1/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios/1/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n encontrada.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n no encontrada.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener la relaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" data-method="GET"
      data-path="api/mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    onclick="tryItOut('GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    onclick="cancelTryOut('GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>mensaje_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="mensaje_id"                data-endpoint="GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="1"
               data-component="url">
    <br>
<p>ID del mensaje. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id_receptor</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id_receptor"                data-endpoint="GETapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="1"
               data-component="url">
    <br>
<p>ID del usuario receptor. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="mensajes-usuarios-POSTapi-mensaje-usuarios">Crear relación

Crea una nueva relación entre mensaje y usuario.</h2>

<p>
</p>



<span id="example-requests-POSTapi-mensaje-usuarios">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"mensaje_id\": 1,
    \"usuario_id_receptor\": 1,
    \"estado\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mensaje_id": 1,
    "usuario_id_receptor": 1,
    "estado": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-mensaje-usuarios">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n creada exitosamente.</code>
 </pre>
            <blockquote>
            <p>Example response (409):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n ya existente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear la relaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-mensaje-usuarios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-mensaje-usuarios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mensaje-usuarios"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mensaje-usuarios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mensaje-usuarios">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mensaje-usuarios" data-method="POST"
      data-path="api/mensaje-usuarios"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mensaje-usuarios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mensaje-usuarios"
                    onclick="tryItOut('POSTapi-mensaje-usuarios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mensaje-usuarios"
                    onclick="cancelTryOut('POSTapi-mensaje-usuarios');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mensaje-usuarios"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mensaje-usuarios</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mensaje-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mensaje-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mensaje_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="mensaje_id"                data-endpoint="POSTapi-mensaje-usuarios"
               value="1"
               data-component="body">
    <br>
<p>ID del mensaje. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usuario_id_receptor</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id_receptor"                data-endpoint="POSTapi-mensaje-usuarios"
               value="1"
               data-component="body">
    <br>
<p>ID del usuario receptor. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-mensaje-usuarios" style="display: none">
            <input type="radio" name="estado"
                   value="true"
                   data-endpoint="POSTapi-mensaje-usuarios"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-mensaje-usuarios" style="display: none">
            <input type="radio" name="estado"
                   value="false"
                   data-endpoint="POSTapi-mensaje-usuarios"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Estado del mensaje (leído/no leído). Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="mensajes-usuarios-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">Actualizar estado

Actualiza el estado de lectura de un mensaje para un usuario.</h2>

<p>
</p>



<span id="example-requests-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios/1/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"estado\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios/1/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "estado": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Estado actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaci&oacute;n no encontrada.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al actualizar el estado.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" data-method="PUT"
      data-path="api/mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    onclick="tryItOut('PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    onclick="cancelTryOut('PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>mensaje_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="mensaje_id"                data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="1"
               data-component="url">
    <br>
<p>ID del mensaje. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id_receptor</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id_receptor"                data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="1"
               data-component="url">
    <br>
<p>ID del usuario receptor. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" style="display: none">
            <input type="radio" name="estado"
                   value="true"
                   data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" style="display: none">
            <input type="radio" name="estado"
                   value="false"
                   data-endpoint="PUTapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Nuevo estado del mensaje. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="mensajes-usuarios-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">Eliminar relación

Elimina una relación entre mensaje y usuario.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios/1/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mensaje-usuarios/1/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Registro eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Registro no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el registro.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-" data-method="DELETE"
      data-path="api/mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    onclick="tryItOut('DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    onclick="cancelTryOut('DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/mensaje-usuarios/{mensaje_id}/{usuario_id_receptor}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>mensaje_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="mensaje_id"                data-endpoint="DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="1"
               data-component="url">
    <br>
<p>ID del mensaje. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id_receptor</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="usuario_id_receptor"                data-endpoint="DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>usuario_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usuario_id"                data-endpoint="DELETEapi-mensaje-usuarios--mensaje_id---usuario_id_receptor-"
               value="1"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="minimos-por-evento">Mínimos por Evento</h1>

    

                                <h2 id="minimos-por-evento-GETapi-minimos-evento">Listar mínimos

Obtiene una lista de todos los mínimos de instrumentos requeridos por evento.</h2>

<p>
</p>



<span id="example-requests-GETapi-minimos-evento">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-minimos-evento">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Relaciones listadas correctamente</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener los m&iacute;nimos.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-minimos-evento" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-minimos-evento"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-minimos-evento"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-minimos-evento" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-minimos-evento">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-minimos-evento" data-method="GET"
      data-path="api/minimos-evento"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-minimos-evento', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-minimos-evento"
                    onclick="tryItOut('GETapi-minimos-evento');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-minimos-evento"
                    onclick="cancelTryOut('GETapi-minimos-evento');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-minimos-evento"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/minimos-evento</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-minimos-evento"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-minimos-evento"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="minimos-por-evento-POSTapi-minimos-evento">Crear mínimo

Establece un nuevo mínimo de instrumentos requerido para un evento.</h2>

<p>
</p>



<span id="example-requests-POSTapi-minimos-evento">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"evento_id\": 1,
    \"instrumento_tipo_id\": \"\\\"violin\\\"\",
    \"cantidad\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "evento_id": 1,
    "instrumento_tipo_id": "\"violin\"",
    "cantidad": 2
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-minimos-evento">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">M&iacute;nimo de instrumento creado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear el m&iacute;nimo.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-minimos-evento" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-minimos-evento"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-minimos-evento"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-minimos-evento" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-minimos-evento">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-minimos-evento" data-method="POST"
      data-path="api/minimos-evento"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-minimos-evento', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-minimos-evento"
                    onclick="tryItOut('POSTapi-minimos-evento');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-minimos-evento"
                    onclick="cancelTryOut('POSTapi-minimos-evento');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-minimos-evento"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/minimos-evento</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-minimos-evento"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-minimos-evento"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="POSTapi-minimos-evento"
               value="1"
               data-component="body">
    <br>
<p>ID del evento. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrumento_tipo_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento_tipo_id"                data-endpoint="POSTapi-minimos-evento"
               value=""violin""
               data-component="body">
    <br>
<p>ID del tipo de instrumento. Example: <code>"violin"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cantidad</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cantidad"                data-endpoint="POSTapi-minimos-evento"
               value="2"
               data-component="body">
    <br>
<p>Cantidad mínima requerida. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="minimos-por-evento-GETapi-minimos-evento--evento_id---instrumento_tipo_id-">Mostrar mínimo

Obtiene el mínimo de instrumentos requerido para un evento específico.</h2>

<p>
</p>



<span id="example-requests-GETapi-minimos-evento--evento_id---instrumento_tipo_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento/1/&amp;quot;violin&amp;quot;" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento/1/&amp;quot;violin&amp;quot;"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-minimos-evento--evento_id---instrumento_tipo_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">M&iacute;nimo de instrumento obtenido correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">M&iacute;nimo de instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener el m&iacute;nimo.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-minimos-evento--evento_id---instrumento_tipo_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-minimos-evento--evento_id---instrumento_tipo_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-minimos-evento--evento_id---instrumento_tipo_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-minimos-evento--evento_id---instrumento_tipo_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-minimos-evento--evento_id---instrumento_tipo_id-" data-method="GET"
      data-path="api/minimos-evento/{evento_id}/{instrumento_tipo_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-minimos-evento--evento_id---instrumento_tipo_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    onclick="tryItOut('GETapi-minimos-evento--evento_id---instrumento_tipo_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    onclick="cancelTryOut('GETapi-minimos-evento--evento_id---instrumento_tipo_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/minimos-evento/{evento_id}/{instrumento_tipo_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="1"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>instrumento_tipo_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento_tipo_id"                data-endpoint="GETapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value=""violin""
               data-component="url">
    <br>
<p>ID del tipo de instrumento. Example: <code>"violin"</code></p>
            </div>
                    </form>

                    <h2 id="minimos-por-evento-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-">Actualizar mínimo

Actualiza la cantidad mínima requerida de un instrumento para un evento.</h2>

<p>
</p>



<span id="example-requests-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento/1/&amp;quot;violin&amp;quot;" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"cantidad\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento/1/&amp;quot;violin&amp;quot;"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "cantidad": 3
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Registro actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Registro no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al actualizar el m&iacute;nimo.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-" data-method="PUT"
      data-path="api/minimos-evento/{evento_id}/{instrumento_tipo_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-minimos-evento--evento_id---instrumento_tipo_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    onclick="tryItOut('PUTapi-minimos-evento--evento_id---instrumento_tipo_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    onclick="cancelTryOut('PUTapi-minimos-evento--evento_id---instrumento_tipo_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/minimos-evento/{evento_id}/{instrumento_tipo_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="1"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>instrumento_tipo_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento_tipo_id"                data-endpoint="PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value=""violin""
               data-component="url">
    <br>
<p>ID del tipo de instrumento. Example: <code>"violin"</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cantidad</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cantidad"                data-endpoint="PUTapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="3"
               data-component="body">
    <br>
<p>Nueva cantidad mínima. Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="minimos-por-evento-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-">Eliminar mínimo

Elimina el requerimiento mínimo de un instrumento para un evento.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento/1/&amp;quot;violin&amp;quot;" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/minimos-evento/1/&amp;quot;violin&amp;quot;"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Registro eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Registro no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el registro.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-" data-method="DELETE"
      data-path="api/minimos-evento/{evento_id}/{instrumento_tipo_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    onclick="tryItOut('DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    onclick="cancelTryOut('DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/minimos-evento/{evento_id}/{instrumento_tipo_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>evento_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="evento_id"                data-endpoint="DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value="1"
               data-component="url">
    <br>
<p>ID del evento. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>instrumento_tipo_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento_tipo_id"                data-endpoint="DELETEapi-minimos-evento--evento_id---instrumento_tipo_id-"
               value=""violin""
               data-component="url">
    <br>
<p>ID del tipo de instrumento. Example: <code>"violin"</code></p>
            </div>
                    </form>

                <h1 id="tipos-de-instrumentos">Tipos de Instrumentos</h1>

    

                                <h2 id="tipos-de-instrumentos-GETapi-tipo-instrumentos">Listar tipos de instrumentos.

Obtiene una lista de todos los tipos de instrumentos registrados en el sistema.</h2>

<p>
</p>



<span id="example-requests-GETapi-tipo-instrumentos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tipo-instrumentos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipos de instrumentos obtenidos correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener los tipos de instrumentos.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tipo-instrumentos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tipo-instrumentos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tipo-instrumentos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tipo-instrumentos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tipo-instrumentos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tipo-instrumentos" data-method="GET"
      data-path="api/tipo-instrumentos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tipo-instrumentos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tipo-instrumentos"
                    onclick="tryItOut('GETapi-tipo-instrumentos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tipo-instrumentos"
                    onclick="cancelTryOut('GETapi-tipo-instrumentos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tipo-instrumentos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tipo-instrumentos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tipo-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tipo-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="tipos-de-instrumentos-POSTapi-tipo-instrumentos">Crear tipo de instrumento.

Crea un nuevo tipo de instrumento en el sistema.</h2>

<p>
</p>



<span id="example-requests-POSTapi-tipo-instrumentos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"instrumento\": \"architecto\",
    \"cantidad\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "instrumento": "architecto",
    "cantidad": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-tipo-instrumentos">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento creado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al crear el tipo de instrumento.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-tipo-instrumentos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tipo-instrumentos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tipo-instrumentos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-tipo-instrumentos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tipo-instrumentos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-tipo-instrumentos" data-method="POST"
      data-path="api/tipo-instrumentos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tipo-instrumentos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tipo-instrumentos"
                    onclick="tryItOut('POSTapi-tipo-instrumentos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tipo-instrumentos"
                    onclick="cancelTryOut('POSTapi-tipo-instrumentos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tipo-instrumentos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tipo-instrumentos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-tipo-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-tipo-instrumentos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrumento</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrumento"                data-endpoint="POSTapi-tipo-instrumentos"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del tipo de instrumento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cantidad</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cantidad"                data-endpoint="POSTapi-tipo-instrumentos"
               value="16"
               data-component="body">
    <br>
<p>Cantidad disponible del tipo de instrumento. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="tipos-de-instrumentos-GETapi-tipo-instrumentos--id-">Obtener tipo de instrumento.

Devuelve los detalles de un tipo de instrumento específico según su ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-tipo-instrumentos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tipo-instrumentos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener el tipo de instrumento.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tipo-instrumentos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tipo-instrumentos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tipo-instrumentos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tipo-instrumentos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tipo-instrumentos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tipo-instrumentos--id-" data-method="GET"
      data-path="api/tipo-instrumentos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tipo-instrumentos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tipo-instrumentos--id-"
                    onclick="tryItOut('GETapi-tipo-instrumentos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tipo-instrumentos--id-"
                    onclick="cancelTryOut('GETapi-tipo-instrumentos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tipo-instrumentos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tipo-instrumentos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tipo-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tipo-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-tipo-instrumentos--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del tipo de instrumento a consultar. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="tipos-de-instrumentos-PUTapi-tipo-instrumentos--id-">Actualizar tipo de instrumento.

Actualiza los datos de un tipo de instrumento existente.</h2>

<p>
</p>



<span id="example-requests-PUTapi-tipo-instrumentos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"instrumento\": \"architecto\",
    \"cantidad\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "instrumento": "architecto",
    "cantidad": 16
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-tipo-instrumentos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-tipo-instrumentos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-tipo-instrumentos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-tipo-instrumentos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-tipo-instrumentos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-tipo-instrumentos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-tipo-instrumentos--id-" data-method="PUT"
      data-path="api/tipo-instrumentos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-tipo-instrumentos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-tipo-instrumentos--id-"
                    onclick="tryItOut('PUTapi-tipo-instrumentos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-tipo-instrumentos--id-"
                    onclick="cancelTryOut('PUTapi-tipo-instrumentos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-tipo-instrumentos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/tipo-instrumentos/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/tipo-instrumentos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-tipo-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-tipo-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-tipo-instrumentos--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del tipo de instrumento a actualizar. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrumento</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="instrumento"                data-endpoint="PUTapi-tipo-instrumentos--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del tipo de instrumento. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cantidad</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cantidad"                data-endpoint="PUTapi-tipo-instrumentos--id-"
               value="16"
               data-component="body">
    <br>
<p>Cantidad disponible del tipo de instrumento. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="tipos-de-instrumentos-DELETEapi-tipo-instrumentos--id-">Eliminar tipo de instrumento.

Elimina un tipo de instrumento del sistema.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-tipo-instrumentos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/tipo-instrumentos/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-tipo-instrumentos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Tipo de instrumento no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el tipo de instrumento.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-tipo-instrumentos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-tipo-instrumentos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-tipo-instrumentos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-tipo-instrumentos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-tipo-instrumentos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-tipo-instrumentos--id-" data-method="DELETE"
      data-path="api/tipo-instrumentos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-tipo-instrumentos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-tipo-instrumentos--id-"
                    onclick="tryItOut('DELETEapi-tipo-instrumentos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-tipo-instrumentos--id-"
                    onclick="cancelTryOut('DELETEapi-tipo-instrumentos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-tipo-instrumentos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/tipo-instrumentos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-tipo-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-tipo-instrumentos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-tipo-instrumentos--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del tipo de instrumento a eliminar. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="usuarios">Usuarios</h1>

    

                                <h2 id="usuarios-POSTapi-mailTo">Enviar correo personalizado.

Envía un correo electrónico personalizado a un usuario.</h2>

<p>
</p>



<span id="example-requests-POSTapi-mailTo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mailTo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"mensaje\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/mailTo"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "mensaje": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-mailTo">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Correo enviado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al enviar el correo.</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-mailTo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-mailTo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mailTo"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mailTo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mailTo">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mailTo" data-method="POST"
      data-path="api/mailTo"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mailTo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mailTo"
                    onclick="tryItOut('POSTapi-mailTo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mailTo"
                    onclick="cancelTryOut('POSTapi-mailTo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mailTo"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mailTo</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mailTo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mailTo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-mailTo"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Correo electrónico del destinatario. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mensaje</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mensaje"                data-endpoint="POSTapi-mailTo"
               value="architecto"
               data-component="body">
    <br>
<p>Contenido del mensaje a enviar. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="usuarios-GETapi-usuarios">Listar usuarios.

Obtiene una lista de todos los usuarios registrados en el sistema.</h2>

<p>
</p>



<span id="example-requests-GETapi-usuarios">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-usuarios">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuarios obtenidos correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al obtener los usuarios.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-usuarios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-usuarios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-usuarios"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-usuarios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-usuarios">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-usuarios" data-method="GET"
      data-path="api/usuarios"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-usuarios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-usuarios"
                    onclick="tryItOut('GETapi-usuarios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-usuarios"
                    onclick="cancelTryOut('GETapi-usuarios');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-usuarios"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/usuarios</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="usuarios-GETapi-usuarios--id-">Obtener un usuario.

Devuelve los detalles de un usuario específico según su ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-usuarios--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-usuarios--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario no encontrado.</code>
 </pre>
    </span>
<span id="execution-results-GETapi-usuarios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-usuarios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-usuarios--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-usuarios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-usuarios--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-usuarios--id-" data-method="GET"
      data-path="api/usuarios/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-usuarios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-usuarios--id-"
                    onclick="tryItOut('GETapi-usuarios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-usuarios--id-"
                    onclick="cancelTryOut('GETapi-usuarios--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-usuarios--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/usuarios/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-usuarios--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario a consultar. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="usuarios-PUTapi-usuarios--id-">Actualizar usuario.

Actualiza los datos de un usuario existente.</h2>

<p>
</p>



<span id="example-requests-PUTapi-usuarios--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"architecto\",
    \"apellido1\": \"architecto\",
    \"apellido2\": \"architecto\",
    \"telefono\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\",
    \"password_confirmation\": \"architecto\",
    \"estado\": \"architecto\",
    \"fecha_nac\": \"architecto\",
    \"fecha_entrada\": \"architecto\",
    \"role\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "architecto",
    "apellido1": "architecto",
    "apellido2": "architecto",
    "telefono": "architecto",
    "email": "gbailey@example.net",
    "password": "|]|{+-",
    "password_confirmation": "architecto",
    "estado": "architecto",
    "fecha_nac": "architecto",
    "fecha_entrada": "architecto",
    "role": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-usuarios--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario actualizado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error de validaci&oacute;n.</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-usuarios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-usuarios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-usuarios--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-usuarios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-usuarios--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-usuarios--id-" data-method="PUT"
      data-path="api/usuarios/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-usuarios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-usuarios--id-"
                    onclick="tryItOut('PUTapi-usuarios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-usuarios--id-"
                    onclick="cancelTryOut('PUTapi-usuarios--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-usuarios--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/usuarios/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-usuarios--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario a actualizar. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nombre del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>apellido1</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="apellido1"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Primer apellido del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>apellido2</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="apellido2"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Segundo apellido del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>telefono</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="telefono"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Número de teléfono del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-usuarios--id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Correo electrónico del usuario. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-usuarios--id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Contraseña del usuario. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Confirmación de la contraseña. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estado</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="estado"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Estado del usuario (activo, suspendido, bloqueado). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_nac</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fecha_nac"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Fecha de nacimiento del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_entrada</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fecha_entrada"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Fecha de entrada del usuario. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="PUTapi-usuarios--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Rol del usuario (admin, miembro). Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="usuarios-DELETEapi-usuarios--id-">Eliminar usuario.

Elimina un usuario del sistema.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-usuarios--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-usuarios--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario eliminado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al eliminar el usuario.</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-usuarios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-usuarios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-usuarios--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-usuarios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-usuarios--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-usuarios--id-" data-method="DELETE"
      data-path="api/usuarios/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-usuarios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-usuarios--id-"
                    onclick="tryItOut('DELETEapi-usuarios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-usuarios--id-"
                    onclick="cancelTryOut('DELETEapi-usuarios--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-usuarios--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/usuarios/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-usuarios--id-"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario a eliminar. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="usuarios-PATCHapi-usuarios--id--approve">Aprobar usuario.

Cambia el estado de un usuario a &#039;activo&#039;.</h2>

<p>
</p>



<span id="example-requests-PATCHapi-usuarios--id--approve">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16/approve" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16/approve"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-usuarios--id--approve">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario aprobado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario no encontrado.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Error al aprobar el usuario.</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-usuarios--id--approve" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-usuarios--id--approve"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-usuarios--id--approve"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-usuarios--id--approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-usuarios--id--approve">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-usuarios--id--approve" data-method="PATCH"
      data-path="api/usuarios/{id}/approve"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-usuarios--id--approve', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-usuarios--id--approve"
                    onclick="tryItOut('PATCHapi-usuarios--id--approve');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-usuarios--id--approve"
                    onclick="cancelTryOut('PATCHapi-usuarios--id--approve');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-usuarios--id--approve"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/usuarios/{id}/approve</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-usuarios--id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-usuarios--id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PATCHapi-usuarios--id--approve"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario a aprobar. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="usuarios-PATCHapi-usuarios--id--block">Bloquear usuario.

Cambia el estado de un usuario a &#039;bloqueado&#039;.</h2>

<p>
</p>



<span id="example-requests-PATCHapi-usuarios--id--block">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16/block" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.iestrassierra.net/alumnado/curso2425/DAW/daw2425a16/laravel/api/usuarios/16/block"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-usuarios--id--block">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario bloqueado correctamente.</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario ya bloqueado.</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Usuario no encontrado.</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-usuarios--id--block" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-usuarios--id--block"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-usuarios--id--block"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-usuarios--id--block" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-usuarios--id--block">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-usuarios--id--block" data-method="PATCH"
      data-path="api/usuarios/{id}/block"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-usuarios--id--block', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-usuarios--id--block"
                    onclick="tryItOut('PATCHapi-usuarios--id--block');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-usuarios--id--block"
                    onclick="cancelTryOut('PATCHapi-usuarios--id--block');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-usuarios--id--block"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/usuarios/{id}/block</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-usuarios--id--block"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-usuarios--id--block"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PATCHapi-usuarios--id--block"
               value="16"
               data-component="url">
    <br>
<p>ID del usuario a bloquear. Example: <code>16</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
