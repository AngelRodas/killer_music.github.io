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
    <link rel="stylesheet" href="css/styles.css">
    <title>BeatBoddy</title>
    <link rel="icon" href="imageneslogin/vectorLogoEpico21.svg">
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
                    <a href="../Inicio App Music/ini.html">
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
                    <a href="#">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Iniciar sesión</span>
                    </a>
                </li>
                <li>
                    <a href="../index.html">
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
    <img src="../img/imagen sesion.jpg" alt="">
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
    <div class="contenedor__todo">

        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Inicia sesion para entrar ala pagina</p>
                <button id="btn__iniciar-sesion">Iniciar sesion</button>
            </div>
            <div class="caja__trasera-register">
                <h3>¿Aun no tienes cuenta?</h3>
                <p>Registrate para que puedas iniciar sesion</p>
                <button id="btn__registrarse">registrarse</button>
            </div>
        </div>

        <div class="contenedor__login-register">

            <form action="" method="POST" class="formulario__login">
                <h2>iniciar sesion</h2>
                <input type="text" placeholder="Correo Electronico" name="correo">
                <input type="password" placeholder="contraseña" name="contrasena">
                <button>entrar</button>
            </form>

            <form action="" method="POST" class="formulario__register">
                <h2>registrarse</h2>
                <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                <input type="text" placeholder="correo Electronico" name="correo">
               <input type="text" placeholder="usuario" name="usuario">
               <input type="password" placeholder="contraseña" name="contrasena">
               <button>Registrarse</button>
            </form>
        </div>

    </div>
    <script src="log/lo.js"></script>
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../js/main.js"></script>
</main>
</body>
</html>