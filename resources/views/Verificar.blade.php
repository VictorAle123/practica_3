<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Verificar</title>
    </head>
    <body>
    <body>
    <h2>Hola {{ $name }}, </h2>
    <p>Verifica tu cuenta para poder acceder a nuestros posts</p>
    <a href="{{ url('api/verificar/' . $confirmation_code) }}">
        Clic para confirmar tu email
    </a>
    </body>
</html>