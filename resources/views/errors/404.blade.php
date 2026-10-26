<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 · {{ config('app.name') }}</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>404 · Página não encontrada</h1>
        <p>A página que procuras não existe.</p>
        <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>
    </main>
</body>
</html>