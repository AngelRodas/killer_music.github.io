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
    <link rel="stylesheet" href="css/main.css">
    <title>BeatBuddy</title>
</head>
<body>
    <div class="menu">
        <ion-icon name="play-outline"></ion-icon>
        <ion-icon name="pause-outline"></ion-icon>
    </div>
    <div class="barra-lateral ">
        <div>
        <div class="n-pagina">
          <ion-icon id="cloud" name="play-outline"></ion-icon>
          <span>BeatBuddy</span>
        </div>
        <button class="boton">
            <ion-icon name="add-circle-outline"></ion-icon>   
            <span>Agregar</span> 
        </button>
    </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a href="./Inicio App Music/ini.html">
                        <ion-icon name="home-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <ion-icon name="heart-outline"></ion-icon>
                        <span>Favoritos</span>
                    </a>
                </li>
                <li>
                    <a href="LoginBeatBuddyV1/login.html">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Iniciar sesión</span>
                    </a>
                </li>
                <li>
                  <a href="../ven.html">
                    <ion-icon name="disc-outline"></ion-icon>
                    <span>Discos</span>
                </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="bookmark-outline"></ion-icon>
                        <span>Important</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                        <span>Spam</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="trash-outline"></ion-icon>
                        <span>eliminar</span>
                    </a>
                </li>
            </ul>
        </nav>
<div>
        <div class="linea"></div>

        <div class="modo-oscuro">
            <div class="info">
                <ion-icon name="moon-outline"></ion-icon>
                <span>Modo oscuro</span>
            </div>
            <div class="switch">
                <div class="base">
                    <div class="circulo">
                        
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="usuario"><!--imagen de sesion -->
      <img src="img/imagen sesion.jpg" alt="">
      <div class="info-usuario">
        <div class="nombre-email">
          <span class="nombre">Pikachu</span>
          <span class="email">Pikachu@gmail.com</span>
        </div>
        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
      </div>
    </div>
    </div>
</div>
<main>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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

<!-- otro artistas -->

    <div class="i-ar">
        <img class="p-a" src="https://yt3.ggpht.com/WAPIdR1wIIn7LJThOA9HCCWZi1HMEJYWhWc93LOj9-lq246Kt8IuFG3x4ruIiR4WWiDrpk31_Q=s176-c-k-c0x00ffffff-no-rj" alt="artista">
        <h1 class="n-ar">Twenty one pilots</h1>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <img src="https://m.media-amazon.com/images/I/91Zu678z1TL._AC_UL320_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Clancy</h2>
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <img src="https://m.media-amazon.com/images/I/91jyPgz-o4L._AC_UL320_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Scaled and Icy</h2>
                    <h3 class="player__song">2021</h3>
               
                  
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <img src="https://m.media-amazon.com/images/I/81znz4j2UTL._AC_UL320_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Trench</h2>
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


            <div class="swiper-slide">
                <div class="player">
                    <div class="player__controls">
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <img src="https://m.media-amazon.com/images/I/71MRKrpsukL._AC_UL320_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Blurryface</h2>
                    <h3 class="player__song">2015</h3>
               
                  
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <img src="https://m.media-amazon.com/images/I/61PX1uDSjgL._AC_UL320_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Vessel</h2>
                    <h3 class="player__song">2013</h3>
               
                  
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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
                      <img src="https://m.media-amazon.com/images/I/716qi-1n5GL._AC_UY218_.jpg" alt="Album Cover" class="player__img" loading="lazy" />
                    </div>
               
                    <h2 class="player__artist">Twenty one pilots</h2>
                    <h3 class="player__song">2009</h3>
               
                  
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
                      <div class="player__btn player__btn--small" id="previous">
                        <i class="fas fa-arrow-left"></i>
                      </div>
                      <h5 class="player__title">playing now</h5>
                      <div class="player__btn player__btn--small" id="icon-menu">
                        <i class="fas fa-bars"></i>
                      </div>
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

    
</main>
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>