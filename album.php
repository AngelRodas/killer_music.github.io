<?php 
    require_once "includes/header.php";
    $conn = Cconexion::conexionDB();
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
            <a href="musica.php"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container">
	    <input type="text" placeholder="Buscar">
		<div class="btn">
			<ion-icon name="search-outline"></ion-icon>
		</div>
	</div>
    <?php
       if(isset($_GET['AlbumID'])){
            $AlbumID = $_GET['AlbumID'];
            $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
            $query = "select NombreArtistico, Imagen from Artista inner join Album on Album.ArtistaID = Artista.ArtistaID where Album.AlbumID = ?";
            $selectArtista = $conn->prepare($query,$options);
            if($selectArtista->execute(array($AlbumID))){
                if($selectArtista->rowCount()>0)
                {
                    while($row = $selectArtista->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='i-ar'>";
                        echo    "<img class='p-a' src='".$row['Imagen']."' alt=''>";
                        echo    "<h1 class='n-ar'>". $row['NombreArtistico']."</h1>";
                        echo "</div>";
                    }    
                }
            }
            $query2 = "select Cancion.*, Album.Portada, Album.Anio from Cancion inner join Album on Album.AlbumID = Cancion.AlbumID where Album.AlbumID = ?";
            $selectCancion = $conn->prepare($query2,$options);
            if($selectCancion->execute(array($AlbumID))){
                if($selectCancion->rowCount()>0){
                    echo "<div class='swiper mySwiper'>";
                    echo "  <div class='swiper-wrapper'>";
                    while($row2 = $selectCancion->fetch(PDO::FETCH_ASSOC)){                    
                        ?>
                            <div class="swiper-slide">
                            <div class="player">
                                <div class="player__controls">
                                    <div class="player__btn player__btn--small" id="previous"  >
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
        
                                    <h5 class="player__title">playing now</h5>
                                    <a class="player__btn player__btn--small">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                    <div class="player__menu hide" id="menu">
                                        <ul>
                                            <li>Canción 1</li>
                                            <li>Canción 2</li>
                                            <li>Canción 3</li>
                                            <!-- Agrega más canciones aquí -->
                                        </ul>
                                    </div>
                                </div>      
                                <div class="player__album">
                                    <?php 
                                        echo "<a href='album.php?AlbumID=".$row2['AlbumID']."'><img src='". $row2['Portada']."' alt='Album Cover' class='player__img' loading='lazy' /></a>";
                                    ?>
                                </div>
                                <?php 
                                    echo "<h2 class='player__artist'>". $row2['Nombre']."</h2>";
                                    echo "<h3 class='player__song'>". $row2['Anio']."</h3>";                                 
                                    echo "<audio src='".$row2['Archivo']."' controls='controls' preload='none'></audio>";
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
       }
       else {
            header("Location: musica.php");
       }
    ?>
</body>
<?php
    require_once "includes/footer.php";
?>
</html>