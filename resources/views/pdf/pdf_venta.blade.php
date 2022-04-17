<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta #{{$venta->id}}</title>

    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css">
</head>
<body>
    <p>Venta: {{$venta->cantidad}} | {{$venta->venta}} | {{$venta->descripcion}} | {{$venta->preciou}} | {{$venta->preciot}}</p>

    <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div>
</body>
</html>