<?php

require_once "includes/header.php";
if (!isset($_SESSION['UsuarioID'])){
    header("Location: login.php");
}

if ($_SESSION['EsAdmin']==0){
    echo "Usted no tiene permisos de estar acá!, fuera o le digo a tus papás";
    exit;
}

require_once "includes/formulario.php";
 $conn = Cconexion::ConexionDB();
 if (!isset($_SESSION['UsuarioID'])){
    header("Location: index.php");
}
?>
<?php 
if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio']; 
    $portada = $_POST['portada']; 
    $genero = $_POST['genero']; 
    $artista = $_POST['artista']; 
    if(strlen($genero)>0 && strlen($nombre)>0 && strlen($anio)>0 && strlen($portada)>0 && strlen($artista)>0){
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "SELECT AlbumID, Genero FROM Genero";
        $selectGenero = $conn->prepare($query,$options);
        if($selectGenero->execute()){
            while($row = $selectGenero->fetch(PDO::FETCH_ASSOC)){
                if($genero == $row['Genero']){
                    $genero = $row['AlbumID'];
                    $query2 = "SELECT ArtistaID, NombreArtistico FROM Artista";
                    $selectArtista = $conn->prepare($query2,$options);
                    if($selectArtista->execute()){
                        while($row2 = $selectArtista->fetch(PDO::FETCH_ASSOC)){
                            if($artista == $row2['NombreArtistico']){
                                $artista = $row2['ArtistaID'];
                                $options3 = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
                                $insertAlbum = $conn->prepare("INSERT INTO Album(Nombre, Anio, Portada, ArtistaID, AlbumID) values(?,?,?,?,?)", $options3);

                                if($insertAlbum->execute(array($nombre, $anio, $portada, $artista, $genero))) {
                                    echo "Album registrado exitósamente";

                                } else {
                                    echo "Error: " . $insertAlbum->errorInfo();
                                }            
                                unset($insertAlbum);                                
                            }                          
                        }
                    }
                }                  
            }
        }
    }
}
else if(isset($_POST['actualizar'])){
    $nombre = $row['Nombre'];
                        $anio = $row['Anio'];
                        $portada = $row['Portada'];
                        $album = $row['AlbumID'];
    if(strlen($genero)>0){
        $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $UpdateQuery = $conn->prepare("UPDATE Genero set Genero = ?, Descripcion = ? where AlbumID = ?", $options);
        
        if($UpdateQuery->execute(array($genero, $descripcion, $AlbumID))) {
            echo "Registro actualizado exitosamente";
                        
        } else {
            echo "Error: " . $UpdateQuery->errorInfo();
        }            
        unset($UpdateQuery);
    }
}
else if(isset($_POST['Eliminar'])){
    $AlbumID = $_POST['AlbumID'];
    $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
    $query = "select * from Album left join Artista on Artista.ArtistaID = Album.ArtistaID left join Genero on Genero.GeneroID = Album.GeneroID where Album.GeneroID = 3 and (Artista.ArtistaID is not null or Genero.GeneroID is not null)";
    $selectQuery = $conn->prepare($query,$options);
    if($selectQuery->execute(array($AlbumID))){
        if($selectQuery->rowCount()>0)
        {
            echo "No se puede eliminar el registro porque está en uso";
        }
        else
        {
            $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
            $DeleteQuery = $conn->prepare("DELETE from Album where AlbumID = ?", $options);
            
            if($DeleteQuery->execute(array($AlbumID))) {
                echo "Registro eliminado exitosamente";
                            
            } else {
                echo "Error: " . $DeleteQuery->errorInfo();
            }            
            unset($DeleteQuery);        
        }
    }
    unset($selectQuery);        
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
        <h2 class="text-center mb-2">Formulario de Album</h2>
        <?php
            if (isset($_POST['Editar'])) {
                $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
                $query = "SELECT * from Album where AlbumID = ?";
                $AlbumID = $_POST['AlbumID'];
                $selectQuery = $conn->prepare($query, $options);
                if ($selectQuery->execute(array($AlbumID))) {
                    while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                        $nombre = $row['Nombre'];
                        $anio = $row['Anio'];
                        $portada = $row['Portada'];
                        $album = $row['AlbumID'];
                    }
                }
                echo "<input type='hidden' name='AlbumID' value='" . $album . "'/>";
            }


            ?>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Nombre:</label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='text' class='form-control' id='nombre' name='nombre' value='" . $nombre . "' required>";
                    } else {
                        echo "<input type='text' class='form-control' id='nombre' name='nombre' required>";
                    }
                    ?>
                </div>
            </div> 
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Artista:</label>
                    <select id="artista" name="artista">
                        <option value='0'>Seleccione....</option>
                        <?php
                        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
                        $query = "SELECT NombreArtistico, ArtistaID from Artista ";
                        $selectQuery = $conn->prepare($query, $options);
                        if ($selectQuery->execute()) {
                            if ($selectQuery->rowCount() > 0) {
                                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                                    if($row['ArtistaID']== $_POST['ArtistaID']){
                                        echo "<option value='" . $row['ArtistaID'] . "' selected>" . $row['NombreArtistico'] . "</option>";    
                                    }
                                    else {
                                    echo "<option value='" . $row['ArtistaID'] . "'>" . $row['NombreArtistico'] . "</option>";
                                    }
                                }
                            }
                        }

                        unset($selectQuery);
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">               
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Año:</label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='number' class='form-control' id='anio' name='anio' value='" . $anio . "' required>";
                    } else {
                        echo "<input type='number' class='form-control' id='anio' name='anio' required>";
                    }
                    ?>                  
                </div>
            </div>
            <div class="row mb-3">               
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Género: </label>
                    <select id="genero" name="genero">
                        <option value='0'>Seleccione....</option>
                        <?php
                        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
                        $query = "SELECT Genero, GeneroID from Genero ";
                        $selectQuery = $conn->prepare($query, $options);
                        if ($selectQuery->execute()) {
                            if ($selectQuery->rowCount() > 0) {
                                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                                    if($row['GeneroID']== $_POST['GeneroID']){
                                        echo "<option value='" . $row['GeneroID'] . "' selected>" . $row['Genero'] . "</option>";    
                                    }
                                    else {
                                    echo "<option value='" . $row['GeneroID'] . "'>" . $row['Genero'] . "</option>";
                                    }
                                }
                            }
                        }

                        unset($selectQuery);
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Imagen: </label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='text' class='form-control' id='portada' name='portada' value='" . $portada . "' required>";
                    } else {
                        echo "<input type='text' class='form-control' id='portada' name='portada' required>";
                    }
                    ?>
                </div>
            </div>
            <div class="text-center">
            <?php
                if (isset($_POST['Editar'])) {
                    echo "<button type='submit' class='btn btn-primary' name='actualizar'>Actualizar</button>";
                } else {
                    echo "<button type='submit' class='btn btn-primary' name='agregar'>Agregar</button>";
                }
                ?>
            </div>
        </form>
    </div>        
        <div class="container">
        <?php
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "select Album.*, Genero.Genero, Artista.NombreArtistico from Album inner join Genero on Genero.GeneroID = Album.GeneroID inner join Artista on Artista.ArtistaID = Album.ArtistaID order by Album.Nombre, Artista.NombreArtistico asc";
        $selectQuery = $conn->prepare($query, $options);
        if ($selectQuery->execute()) {
            if ($selectQuery->rowCount() > 0) {
                echo "<table border='1px'>";
                echo "  <tr>";
                echo "    <td>Nombre</td>";
                echo "    <td>Artista</td>";
                echo "    <td>Año</td>";
                echo "    <td>Portada</td>";
                echo "    <td>Genero</td>";
                echo "  </tr>";
                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "  <form method='POST'>";
                    echo "    <input type='hidden' name='AlbumID' value='" . $row['AlbumID'] . "'/>";
                    echo "    <input type='hidden' name='GeneroID' value='" . $row['GeneroID'] . "'/>";
                    echo "    <input type='hidden' name='ArtistaID' value='" . $row['ArtistaID'] . "'/>";
                    echo "    <td>" . $row['Nombre'] . "</td>";
                    echo "    <td>" . $row['NombreArtistico'] . "</td>";
                    echo "    <td>" . $row['Anio'] . "</td>";
                    echo "    <td>" . $row['Portada'] . "</td>";
                    echo "    <td>" . $row['Genero'] . "</td>";
                    echo "    <td><button type='submit' class='btn btn-primary' name='Editar'>Editar</button></td>";
                    echo "    <td><button type='submit' class='btn btn-primary' name='Eliminar'>Eliminar</button></td>";
                    echo "  </form>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        unset($selectQuery);
        unset($conn);
        ?>
    </div>
</body>
<?php
require_once "includes/footer.php";
?> 