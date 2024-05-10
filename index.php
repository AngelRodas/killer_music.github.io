<?php 
require_once "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--libreria de font-awesome cdn para iconos-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--libreria de swiper js-->
     <link
         rel="stylesheet"
         href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
         />
    <link rel="stylesheet" href="includes/css/main.css">
    <title>BeatBuddy</title>
</head>
<body>
<div class="container">
		<input type="text" placeholder="Buscar">
		<div class="btn">
			<ion-icon name="search-outline"></ion-icon>
		</div>
	</div>
    <div class="i-ar">
        <img class="p-a" src="https://i.scdn.co/image/ab6761610000e5ebdd3a6dced08066fb6f320eaa" alt="">
        <h1 class="n-ar">Jose Madero</h1>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
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
                            <p>¿Deseas eliminar la canción?</p>
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
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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
            <!---->
            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small modal-trigger" id="previous" >
                        <i class="fas fa-arrow-left"></i>
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
                      <img src="https://m.media-amazon.com/images/I/81hvApSGDWL._AC_UY218_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Aurora</h2>
                    <h3 class="player__song">2023</h3>
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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
            <!---->
            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small modal-trigger" id="previous" >
                        <i class="fas fa-arrow-left"></i>
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
                      <img src="https://m.media-amazon.com/images/I/418VBeAtAWL._AC_UY218_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Giallo</h2>
                    <h3 class="player__song">2022</h3>
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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


            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small modal-trigger" id="previous" >
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing tilin</h5>
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
                      <img src="https://m.media-amazon.com/images/I/41HrzhNZlvL._SY300_SX300_QL70_FMwebp_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Psalmos</h2>
                    <h3 class="player__song">2019</h3>
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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
            <!---->
            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small modal-trigger" id="previous" >
                        <i class="fas fa-arrow-left"></i>
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
                      <img src="https://m.media-amazon.com/images/I/91syKF4LFiL._AC_UY218_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Alba</h2>
                    <h3 class="player__song">2018</h3>
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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
            <!---->
            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small modal-trigger" id="previous" >
                        <i class="fas fa-arrow-left"></i>
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
                      <img src="https://m.media-amazon.com/images/I/71l8BYJfKjL._AC_UY218_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Noche</h2>
                    <h3 class="player__song">2017</h3>
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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


            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small modal-trigger" id="previous" >
                        <i class="fas fa-arrow-left"></i>
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
                      <img src="https://m.media-amazon.com/images/I/21u2JoNdIqL._AC_UY218_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Carmesi</h2>
                    <h3 class="player__song">2016</h3>
               
                  
                    <audio class="player__audio" controls id="audio">
                      <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/Leo%20-%20Trying.mp3" type="audio/mpeg" />
                    </audio>
               
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


        </div>
 </div>
<?php
require_once "includes/footer.php";
?> 
</main>
</body>
</html>