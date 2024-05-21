<?php
require_once "includes/header.php";
require_once "includes/formulario.php";
 $conn = Cconexion::ConexionDB();
?>
<?php 
if(isset($_POST['agregar'])){
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero']; 
    if(strlen($genero)>0){
        $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $insertGenero = $conn->prepare("INSERT INTO Genero(Genero, Descripcion) values (?,?)", $options);
        
        if($insertGenero->execute(array($genero, $descripcion))) {
            echo "Género registrado exitósamente";
                        
        } else {
            echo "Error: " . $insertArtista->error;
        }            
        unset($insertGenero);
        unset($conn);
    
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
        <h2 class="text-center mb-2">Formulario de Género</h2>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Género:</label>
                    <input type="text" class="form-control" id="genero" name="genero" required>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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