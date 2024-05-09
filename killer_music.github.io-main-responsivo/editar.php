<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Canción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212;
            color: #FFFFFF;
        }

        .btn-primary {
            background-color: #1DB954;
            border-color: #1DB954;
        }

        .btn-primary:hover {
            background-color: #1ED760;
            border-color: #1ED760;
        }

        .form-label {
            color: #1DB954;
        }

        .form-control {
            background-color: #333;
            color: #FFFFFF;
            border-color: #1DB954;
        }

        .form-control:focus {
            background-color: #444;
            color: #FFFFFF;
            border-color: #1ED760;
            box-shadow: 0 0 0 0.25rem rgba(29, 185, 84, 0.5);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Canción</h1>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="">
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
            </div>

            
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="" required>
            </div>
            
            <div class="mb-3">
                <label for="anio" class="form-label">Año de Lanzamiento:</label>
                <input type="number" class="form-control" id="anio" name="anio" value="" required>
            </div>
            
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
