<?php
    require_once "includes/header.php";
    $conn = Cconexion::conexionDB();
    if (!isset($_SESSION['UsuarioID'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="includes/css/main.css">
    <link rel="stylesheet" href="includes/css/boton.css">
    <title>Document</title>
</head>

<body>
    <?php
    $MostrarSoloFavoritos = false;
    if (isset($_GET['Favoritos'])) {
        $MostrarSoloFavoritos = $_GET['Favoritos'];
    }

    if (isset($_POST['VolverFavorita'])) {
        $UsuarioID = $_SESSION['UsuarioID'];
        $CancionID = $_POST['CancionID'];
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $insertQuery = $conn->prepare("INSERT INTO CancionUsuario(CancionID, UsuarioID, EsFavorita) values (?,?,?)", $options);

        if ($insertQuery->execute(array($CancionID, $UsuarioID, 1))) {
            
        } else {
            echo "Error: " . $insertQuery->errorInfo();
        }
        unset($insertQuery);
    }
    else if (isset($_POST['VolverNoFavorita'])) {

        $UsuarioID = $_POST['UsuarioID'];
        $CancionID = $_POST['CancionID'];
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $DeleteQuery = $conn->prepare("DELETE from CancionUsuario where UsuarioID = ? and CancionID = ?", $options);

        if ($DeleteQuery->execute(array($UsuarioID, $CancionID))) {
            
        } else {
            echo "Error: " . $DeleteQuery->errorInfo();
        }
        unset($DeleteQuery);

        unset($selectQuery);
    }
    ?>
    <div class="posicion">
        <?php
        if ($MostrarSoloFavoritos) {
            echo "<a href='musica.php?Favoritos=true'>";
        } else {
            echo "<a href='musica.php'>";
        }
        ?>
        <div class="player__btn player__btn--small" id="previous">
            <i class="fas fa-arrow-left"></i>
        </div>
        </a>
    </div>
    
    <?php
    if (isset($_GET['AlbumID'])) {
        $AlbumID = $_GET['AlbumID'];
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "select NombreArtistico, Imagen from Artista inner join Album on Album.ArtistaID = Artista.ArtistaID where Album.AlbumID = ?";
        $selectArtista = $conn->prepare($query, $options);
        if ($selectArtista->execute(array($AlbumID))) {
            if ($selectArtista->rowCount() > 0) {
                while ($row = $selectArtista->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='i-ar'>";
                    echo    "<img class='p-a' src='" . $row['Imagen'] . "' alt=''>";
                    echo    "<h1 class='n-ar'>" . $row['NombreArtistico'] . "</h1>";
                    echo "</div>";
                }
            }
        }
        if ($MostrarSoloFavoritos) {
            $query2 = "select c.*, al.Portada, al.Anio, al.Nombre NombreAlbum, cu.EsFavorita from CancionUsuario cu inner join Cancion c on cu.CancionID = c.CancionID inner join Album al on al.AlbumID = c.AlbumID where 1=1 and cu.EsFavorita = 1 and cu.UsuarioID  = ? and al.AlbumID = ?";
            $selectCancion = $conn->prepare($query2, $options);
            $EjecucionSelectCorrecta = $selectCancion->execute(array($_SESSION['UsuarioID'], $AlbumID));
        } else {
            $query2 = "select Cancion.*, Album.Portada, Album.Anio, Album.Nombre NombreAlbum, coalesce(CancionUsuario.EsFavorita,0) EsFavorita from Cancion inner join Album on Album.AlbumID = Cancion.AlbumID left join CancionUsuario on Cancion.CancionID = CancionUsuario.CancionID where Album.AlbumID = ? and (CancionUsuario.UsuarioID = ? or CancionUsuario.CancionUsuarioID is null)";
            $selectCancion = $conn->prepare($query2, $options);
            $EjecucionSelectCorrecta = $selectCancion->execute(array($AlbumID,$_SESSION['UsuarioID']));
        }
        if ($EjecucionSelectCorrecta) {
            if ($selectCancion->rowCount() > 0) {
                echo "<div class='swiper mySwiper'>";
                echo "  <div class='swiper-wrapper'>";
                while ($row2 = $selectCancion->fetch(PDO::FETCH_ASSOC)) {
                    $CancionID = $row2['CancionID']; 
                ?>
                    <div class="swiper-slide">
                        <div class="player">
                            <div class="player__controls">
                                <div class="player__btn player__btn--small" id="previous">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                <!-- Modal -->
                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <p>¿Deseas eliminar el album canción?</p>
                                        <button id="yesBtn">Sí</button>
                                        <button id="noBtn">No</button>
                                    </div>
                                </div>
                                <?php
                                echo "<h5 class='player__title'>" . $row2['NombreAlbum'] . "</h5>";
                                ?>
                                <form action="" method="post">
                                    <?php
                                    $UsuarioID = $_SESSION['UsuarioID'];
                                    echo "  <input type='hidden' name='UsuarioID' value='" . $UsuarioID . "'/>";
                                    echo "  <input type='hidden' name='CancionID' value='" . $row2['CancionID'] . "'/>";
                                    echo "  <input type='hidden' name='EsFavorita' value='" . $row2['EsFavorita'] . "'/>";
                                    echo "  <a class='player__btn player__btn--small'>";
                                    if ($row2['EsFavorita']==1) {
                                        echo "<input type='submit' value='❤️' name='VolverNoFavorita'>";
                                    }
                                    else {
                                        echo "<input type='submit' value='♡' name='VolverFavorita'>";
                                    }
                                    echo "  </a>"
                                    ?>
                                </form>
                                <div class="player__menu hide" id="menu">
                                    <ul>
                                        <li>Canción 1 </li>
                                        <li>Canción 2</li>
                                        <li>Canción 3</li>
                                        <!-- Agrega más canciones aquí -->
                                    </ul>
                                </div>
                            </div>
                            <div class="player__album">
                                <?php
                                echo "<img src='" . $row2['Portada'] . "' alt='Album Cover' class='player__img' loading='lazy' />";
                                ?>
                            </div>
                            <?php
                            echo "<h2 class='player__artist'>" . $row2['Nombre'] . "</h2>";
                            echo "<h3 class='player__song'>" . $row2['Anio'] . "</h3>";
                            echo "<audio src='" . $row2['Archivo'] . "' controls='controls' preload='none'></audio>";
                            ?>
                            <br>
                        </div>
                    </div>
    <?php
                }
                echo "  </div>";
                echo "</div>";
            }
        }
    } else {
        header("Location: musica.php");
    }
    ?>
</body>
<?php
require_once "includes/footer.php";
?>

</html>