<?php
require_once "includes/header.php";
require_once "includes/formulario.php";
 $conn = Cconexion::ConexionDB();
?>

    <?php
    if(isset($_POST['agregar'])){
        $nombre = $_POST['nombre'];
        $album = $_POST['album'];        
        $archivo = $_POST['archivo'];
        $duracion = $_POST['duracion'];
    

        if(strlen($nombre)>0 && strlen($album)>0  && strlen($archivo)>0){
            $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
            $query = "SELECT AlbumID, Nombre FROM Album";
            $selectAlbum = $conn->prepare($query,$options);
            if($selectAlbum->execute()){
                while($row = $selectAlbum->fetch(PDO::FETCH_ASSOC)){
                    if($row['Nombre']==$album){                  
                        $album = $row['AlbumID'];     
                        $options2 = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
                        $insertCancion = $conn->prepare("INSERT INTO Cancion(Nombre, Archivo, AlbumID, Duracion) values (?,?,?,?)", $options2);
        
                        if($insertCancion->execute(array($nombre, "audio/$archivo", $album, $duracion))) {
                        echo "Cancion registrado exitósamente";
                        
                        } else {
                            echo "Error: " . $insertCancion->error;
                        }            
                        unset($insertCancion);
                        unset($conn);
                    }
                }                                                                   
            }
            
        }
    }
    ?>
<body>
<div class="container mt-5">
        <h2 class="text-center mb-2">Formulario de Música</h2>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Nombre de la Canción:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Artista:</label>
                    <input type="text" class="form-control" id="artista" name="artista" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="album" class="form-label fw-bold">Álbum:</label>
                    <input type="text" class="form-control" id="album" name="album" required>
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Archivo MP3:</label>
                    <input type="text" class="form-control" id="genero" name="archivo" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Genero: </label>
                    <input type="text" class="form-control" id="imagen" name="Genero">
                </div>
                <div class="col-md-6">
                    <label for="anio" class="form-label fw-bold">Duracion:</label>
                    <input type="number" class="form-control" id="duracion" name="duracion" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="agregar">Agregar</button>
            </div>
        </form>
            <br>
            <div class="">
                <a href="genero.php"><button class=" btn-primary" name="agregar">Agregar Género</button></a>
            </div>
            <br>
            <div class="">
                <a href="artista.php"><button class=" btn-primary" name="agregar">Agregar Artísta</button></a>
            </div>
            <br>
            <div class="">
                <a href="agregaralbum.php"><button class=" btn-primary">Agregar Album</button></a>
            </div>
            
        

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
</body>
<?php
require_once "includes/footer.php";
?> 
</html>
