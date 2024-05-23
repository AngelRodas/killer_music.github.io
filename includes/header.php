<?php
    include_once("conexion.php");
    Cconexion::ConexionDB();
    session_start();
    setlocale(LC_MONETARY,'es_gt');
?>
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
    <?php 
        if(isset($_SESSION['usuario_email'])){
            if ($_SESSION['EsAdmin']==1){
    ?>
        <a class="agregar" href="agregar.php">
        <button class="boton">
  
          <ion-icon name="add-circle-outline"></ion-icon> 
          
            <span>Agregar</span> 

        </button>
      </a>
    <?php
            }
        }
    ?>
    </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a href="ini.php">
                        <ion-icon name="home-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
                <?php 
                    if(!isset($_SESSION['usuario_email'])){
                ?>
                <li>
                    <a href="login.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Iniciar sesión</span>
                    </a>
                </li>
                <?php 
                }
                ?>
                <?php 
                    if(isset($_SESSION['usuario_email'])){
                ?>
                <li>
                    <a href="musica.php?Favoritos=true">
                       <ion-icon name="heart-outline"></ion-icon>
                        <span>Favoritos</span>
                    </a>
                </li>
                
                <li>
                  <a href="index.php">
                    <ion-icon name="disc-outline"></ion-icon>
                    <span> Mis Discos</span>
                </a>
                </li>
                <li>
                    <a href="musica.php">
                        <ion-icon name="bookmark-outline"></ion-icon>
                        <span>Música</span>
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
                <?php
                }
                ?>
                <?php
                    if (isset($_SESSION['usuario_email']))
                    {                    
                        echo "<li>";
                        echo "  <a href='logout.php?action=logout'>";
                        echo "    <ion-icon name='trash-outline'></ion-icon>";
                        echo "    <span class='link-name'>Cerrar Sesion</span>";
                        echo "  </a>";
                        echo "</li>";                    
                    }
                ?>
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
        <?php 
            if(!isset($_SESSION['usuario_email'])){
                echo "<img src='img/UNknownPerson.png' alt=''>";
                echo "  <div class='info-usuario'>";
                echo "      <div class='nombre-email'>";
                echo "          <span class='nombre'>Desconocido</span>";
            }
            elseif (isset($_SESSION['usuario_email'])){
                if (isset($_SESSION['imagen'])){
                    echo "<img src=' ", $_SESSION['imagen'] ,"' alt=''>";
                }
                elseif (!isset($_SESSION['imagen'])){
                    echo "<img src='img/UNknownPerson.png ' alt=''>";
                }
                echo "  <div class='info-usuario'>";
                echo "      <div class='nombre-email'>";
                echo "          <span class='nombre'>",$_SESSION['usuario'],"</span>";
                echo "          <span class='email'>",$_SESSION['usuario_email'],"</span>";
            }
            ?>
        </div>
        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
      </div>
    </div>
    </div>
</div>
<main>
</body>
</html>