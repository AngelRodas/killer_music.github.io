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
    <title>Document</title>
</head>
<body>
<div class="container">
		<input type="text" placeholder="Buscar">
		<div class="btn">
			<ion-icon name="search-outline"></ion-icon>
		</div>
	</div>
    <?php 
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "SELECT ArtistaID, NombreArtistico, Imagen FROM Artista";
        $query2 = "SELECT Nombre, Anio, Portada, ArtistaID From Album";
        $selectArtista = $conn->prepare($query,$options);
        $selectArtista->execute();
        $selectAlbum = $conn->prepare($query2,$options);
        $selectAlbum->execute(); 
        $i = 0;
        while($row = $selectArtista->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='i-ar'>";
            echo    "<img class='p-a' src='".$row['Imagen']."' alt=''>";
            echo    "<h1 class='n-ar'>". $row['NombreArtistico']."</h1>";
            echo "</div>";
            
            while($row2 = $selectAlbum->fetch(PDO::FETCH_ASSOC)){
                if($row['ArtistaID'] == $row2['ArtistaID']){
                    if($i == 0){
                        echo "<div class='swiper mySwiper'>";
                        echo "  <div class='swiper-wrapper'>";
                        $i = 30;
                    }
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
                            <img src="https://m.media-amazon.com/images/I/41iU4gYOPGL._UX250_FMwebp_QL85_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                        </div>
                        <h2 class="player__artist">Sarajevo</h2>
                        <h3 class="player__song">2024</h3>
                        <audio src="audio/yoru-ni-kakeru.mp3" controls="controls"  preload="none"></audio>
                        <div class="player__controls">
                            <div class="player__btn player__btn--medium" id="backward">
                                <i class="fas fa-backward"></i>
                            </div>            
                            <div class="player__btn player__btn--medium blue play" id="play">
                                <i class="fas fa-play play-btn"></i>
                                <i class="fas fa-pause pause-btn hide"></i>
                            </div>
                            <div class="player__btn player__btn--medium" id="forward">
                                <i class="fas fa-forward"></i>
                            </div>
                        </div>
                    </div>        
                </div>
                <?php
                    
                }
            }
            echo "  </div>";
            echo "</div>";
            $i = 0;
        }
    ?>
</body>
<?php
    require_once "includes/footer.php";
?>
</html>