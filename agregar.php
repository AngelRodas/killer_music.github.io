<?php
require_once "includes/header.php";
require_once "includes/formulario.php";
$conn = Cconexion::ConexionDB();
?>

<?php
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $album = $_POST['album'];
    $archivo = $_POST['archivo'];
    $duracion = $_POST['duracion'];

    if (strlen($nombre) > 0 && $album > 0  && strlen($archivo) > 0 && $duracion > 0) {
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $insertQuery = $conn->prepare("INSERT INTO Cancion(Nombre, Archivo, AlbumID, Duracion) values (?,?,?,?)", $options);

        if ($insertQuery->execute(array($nombre, "audio/$archivo", $album, $duracion))) {
            echo "Canción registrado exitósamente";
        } else {
            echo "Error: " . $insertQuery->errorInfo();
        }
        unset($insertQuery);
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
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="album" class="form-label fw-bold">Álbum:</label>
                    <select id="album" name="album">
                        <option value="0">Seleccione....</option>
                        <?php
                        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
                        $query = "select al.AlbumID, al.Nombre, ar.NombreArtistico + ' (' + al.Nombre + ')' + ' [' + gen.Genero + '] ' DescripcionEspecial from Album al inner join Artista ar on al.ArtistaID = ar.ArtistaID inner join Genero gen on al.GeneroID = gen.GeneroID order by ar.NombreArtistico, al.Nombre asc";
                        $selectQuery = $conn->prepare($query, $options);
                        if ($selectQuery->execute()) {
                            if ($selectQuery->rowCount() > 0) {
                                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row['AlbumID'] . "'>" . $row['DescripcionEspecial'] . "</option>";
                                }
                            }
                        }
                        unset($selectQuery);
                        ?>
                    </select>
                </div>
            </div>
            <div class="row-md-3">
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Archivo MP3:</label>
                    <input type="text" class="form-control" id="archivo" name="archivo" required>
                </div>
            </div>
            <div class="row mb-3">
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
            <a href="genero.php"><button class=" btn-primary" name="agregar">Géneros</button></a>
        </div>
        <br>
        <div class="">
            <a href="artista.php"><button class=" btn-primary" name="agregar">Artístas</button></a>
        </div>
        <br>
        <div class="">
            <a href="agregaralbum.php"><button class=" btn-primary">Albumes</button></a>
        </div>
    </div>
    <div class="container">
        <?php
            $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
            $query = "select c.CancionID, c.Nombre NombreCancion, c.Archivo, c.Duracion, al.AlbumID, al.Nombre NombreAlbum, ar.ArtistaID, ar.NombreArtistico from Cancion c inner join Album al on c.AlbumID = al.AlbumID inner join Artista ar on al.ArtistaID = ar.ArtistaID order by ar.NombreArtistico, al.Nombre, c.Nombre asc";
            $selectQuery = $conn->prepare($query,$options);
            if($selectQuery->execute()){
                if($selectQuery->rowCount()>0)
                {
                    echo "<table>";
                    echo "  <tr>";
                    echo "    <td>Artista</td>";
                    echo "    <td>Album</td>";
                    echo "    <td>Cancion</td>";
                    echo "    <td>Archivo</td>";
                    echo "    <td>Duracion</td>";
                    echo "  </tr>";
                    while($row = $selectQuery->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "  <form method='POST'>";
                        echo "    <input type='hidden' name='GeneroID' value='".$row['CancionID']."'/>";
                        echo "    <td>".$row['NombreArtistico']."</td>";
                        echo "    <td>".$row['NombreAlbum']."</td>";
                        echo "    <td>".$row['NombreCancion']."</td>";
                        echo "    <td>".$row['Archivo']."</td>";
                        echo "    <td>".$row['Duracion']."</td>";
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

</html>