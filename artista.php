<?php
require_once "includes/header.php";
require_once "includes/formulario.php";
 $conn = Cconexion::ConexionDB();
?>
<?php 
if(isset($_POST['agregar'])){
    $nombreA = $_POST['nombrea'];
    $genero = $_POST['genero']; 
    $imagen = $_POST['imagen']; 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $anio = $_POST['anio'];
    $esgrupo = $_POST['esgrupo'];
    if(strlen($genero)>0 && strlen($nombreA)>0){
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "SELECT GeneroID, Genero FROM Genero";
        $selectGenero = $conn->prepare($query,$options);
        if($selectGenero->execute()){
            while($row = $selectGenero->fetch(PDO::FETCH_ASSOC)){
                if($genero == $row['Genero'])
                {
                    $genero = $row['GeneroID']; 
                    if ($esgrupo == "Si" || $esgrupo == "si"){
                        $esgrupo = 1;
                    }
                    elseif ($esgrupo == "No" || $esgrupo == "no"){
                        $esgrupo = 0; 
                    }
                    $options2 = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
                    $insertArtista = $conn->prepare("INSERT INTO Artista(NombreArtistico, Nombre, Apellido, GeneroID, AnioNacimiento, EsGrupo, Imagen) values (?,?,?,?,?,?,?)", $options2);
        
                    if($insertArtista->execute(array($nombreA, $nombre, $apellido, $genero, $anio, $esgrupo, $imagen))) {
                        echo "Artista registrado exitósamente";
                    } else {
                        echo "Error: " . $insertArtista->errorInfo();
                    }            
                    unset($insertArtista);
                    unset($conn);
                }                
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="includes/css/main.css">
    <link rel="stylesheet" href="includes/css/boton.css">
    <title>Document</title>
</head>
<body>
<div class="posicion">
        <div class="player__btn player__btn--small" id="previous"  >
            <a href="agregar.php"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-2">Formulario de Artista</h2>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Artista:</label>
                    <input type="text" class="form-control" id="nombre" name="nombrea" required>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Nombre:</label>
                    <input type="text" class="form-control" id="artista" name="nombre" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="album" class="form-label fw-bold">Apellido:</label>
                    <input type="text" class="form-control" id="album" name="apellido" required>
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Año:</label>
                    <input type="number" class="form-control" id="genero" name="anio" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Género: </label>
                    <input type="text" class="form-control" id="imagen" name="genero">
                </div>
                <div class="col-md-6">
                    <label for="anio" class="form-label fw-bold">Es grupo (si, no):</label>
                    <input type="text" class="form-control" id="duracion" name="esgrupo" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Imagen: </label>
                    <input type="text" class="form-control" id="imagen" name="imagen">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="agregar">Agregar</button>
            </div>
        </form>
</body>
<?php
require_once "includes/footer.php";
?> 