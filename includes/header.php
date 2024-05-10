<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="includes/css/main.css">
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
          <ion-icon id="cloud" name="play-outline"style="color: white;"></ion-icon>
          <span style="color: white;">BeatBuddy</span>
        </div>
        <a class="agregar" href="agregar.php">
        <button class="boton">
  
          <ion-icon name="add-circle-outline"></ion-icon> 
          
            <span>Agregar</span> 

        </button>
      </a>
    </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a href="ini.php">
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
                    <a href="login.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Iniciar sesión</span>
                    </a>
                </li>
                <li>
                  <a href="index.php">
                    <ion-icon name="disc-outline"></ion-icon>
                    <span> Mis Discos</span>
                </a>
                </li>
                <li>
                    <a href="">
                        <ion-icon name="bookmark-outline"></ion-icon>
                        <span>Modo Admin</span>
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
                        <span>Eliminar</span>
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
      <img src="img/imagen_sesion.jpg" alt="">
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
</body>
</html>