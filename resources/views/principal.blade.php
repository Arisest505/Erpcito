
<!DOCTYPE html>
<html lang="en">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
</head>
<body>
    <h1>Bienvenido a la Página Principal</h1>
    <!-- Contenido de la página principal -->

</body>
</html>
