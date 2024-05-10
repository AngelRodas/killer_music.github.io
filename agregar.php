<?php
require_once "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos de Música</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
        }

        .btn-primary {
            background-color: #6a1b9a;
            border-color: #6a1b9a;
        }

        .btn-primary:hover {
            background-color: #7b1fa2;
            border-color: #7b1fa2;
        }

        .btn-warning {
            background-color: #9c27b0;
            border-color: #9c27b0;
        }

        .btn-warning:hover {
            background-color: #ab47bc;
            border-color: #ab47bc;
        }

        .btn-danger {
            background-color: #e91e63;
            border-color: #e91e63;
        }

        .btn-danger:hover {
            background-color: #f44336;
            border-color: #f44336;
        }

        .form-label {
            color: #9c27b0;
        }
    </style>
</head>

<body>
<div class="container mt-5">
        <h2 class="text-center mb-4">Formulario de Música</h2>
        <form action="conexion.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Nombre de la Canción:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Artista:</label>
                    <input type="text" class="form-control" id="artista" name="artista" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="album" class="form-label fw-bold">Álbum:</label>
                    <input type="text" class="form-control" id="album" name="album" required>
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Género:</label>
                    <input type="text" class="form-control" id="genero" name="genero" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Imagen: </label>
                    <input type="text" class="form-control" id="imagen" name="imagen" required>
                </div>
                <div class="col-md-6">
                    <label for="anio" class="form-label fw-bold">Año de Lanzamiento:</label>
                    <input type="number" class="form-control" id="anio" name="anio" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            
        </form>

    </div>
</div>


        <h2 class="text-center mt-5">Listado de Canciones</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="mx-auto p-2 card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4" style="overflow: hidden;">
            <img src="" class="img-fluid rounded-start" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Artista: </p>
                <p class="card-text">Álbum: </p>
                <p class="card-text">Género: </p>
                <p class="card-text">Año: </p>
       
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<?php
require_once "includes/footer.php";
?> 
</html>
