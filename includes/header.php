<?php
include_once("conexion.php");
Cconexion::ConexionDB();
session_start();
setlocale(LC_MONETARY, 'es_gt');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="includes/css/main.css">
    <title>BeatBuddy</title>
    <style>
        <?php
        //include_once "includes/tema.php";

        if (!isset($_SESSION['tema'])) {
            $_SESSION['tema'] = "light";
        }

        if (isset($_GET['action']) && isset($_GET['tema'])) {
            //echo "CambiarTema";
            if ($_GET['action'] == 'CambiarTema') {
                $_SESSION['tema'] = $_GET['tema'];
            }
        }

        if (isset($_SESSION["tema"])) {
            //echo $_SESSION["tema"];
            if ($_SESSION["tema"] == "light") {
                echo ":root{";
                echo    "--barra-lateral:#150909;";
                echo    "--texto1: #f8f3ee;";
                echo    "--texto:#efdfd2;";
                echo    "--letra-c: #e0c1a8;";
                echo    "--letra-co: #ce9a76;";
                echo    "--fondo: #be7951;";
                echo    "--buttom: #af6643;";
                echo    "--fondo2: #974e37;";
                echo    "--fondo3: #885550;";
                echo    "--fondo4: #66322d;";
                echo    "--texto-o: #582c2b;";
                echo  "}";
            } else if ($_SESSION["tema"] == "dark") {
                echo " .dark-mode{";                
                echo "     --barra-lateral:#ffffff;";        
                echo "     --texto1:#70477c ;";                
                echo "     --texto: #ffffff;";                
                echo "     --letra-c:#1e0922;";                
                echo "     --letra-co:#b700ff;";                
                echo "     --fondo:#300a38;";                
                echo "     --buttom:#5a036b;";                
                echo "     --fondo2:#ff00d4 ;";            
                echo "     --fondo3:#7a0991;";            
                echo "     --fondo4:#3d124e;";                
                echo "      --texto-o:#130022 ;";
                echo " } ";
            }
        }
        ?>
    </style>
</head>

<body>
    <div class="menu">
        <ion-icon name="play-outline"></ion-icon>
        <ion-icon name="pause-outline"></ion-icon>
    </div>
    <div class="barra-lateral ">
        <div>
            <div class="n-pagina">
                <ion-icon id="cloud" name="play-outline" style="color: white;"></ion-icon>
                <span style="color: white;">BeatBuddy</span>
            </div>
            <?php
            if (isset($_SESSION['usuario_email'])) {
                if ($_SESSION['EsAdmin'] == 1) {
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
                    <a href="index.php">
                        <ion-icon name="home-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
                <?php
                if (!isset($_SESSION['usuario_email'])) {
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
                if (isset($_SESSION['usuario_email'])) {
                ?>
                    <li>
                        <a href="musica.php?Favoritos=true">
                            <ion-icon name="heart-outline"></ion-icon>
                            <span>Favoritos</span>
                        </a>
                    </li>
                    <li>
                        <a href="musica.php">
                            <ion-icon name="bookmark-outline"></ion-icon>
                            <span>Música</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['usuario_email'])) {
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
                            <?php
                            if (isset($_SESSION["tema"])) {
                                if ($_SESSION["tema"] == "light") {
                            ?>
                                    <ion-icon name="moon-outline">
                            <?php
                                } else if ($_SESSION["tema"] == "dark") {
                            ?>
                                    <ion-icon name="sunny-outline">
                            <?php
                                }
                            }

                            ?>
                        </ion-icon>
                    <span class="link-name">
                        <?php
                        if (isset($_SESSION["tema"])) {
                            if ($_SESSION["tema"] == "light") {
                                echo "Modo Oscuro";
                            } else if ($_SESSION["tema"] == "dark") {
                                echo "Modo Claro";
                            }
                        } else {
                            echo "Modo Oscuro";
                        }
                        ?>
                    </span>
                </div>
                <a <?php
                    if (isset($_SESSION["tema"])) {
                        if ($_SESSION["tema"] == "light") {
                            echo "href='?action=CambiarTema&tema=dark'";
                        } else if ($_SESSION["tema"] == "dark") {
                            echo "href='?action=CambiarTema&tema=light'";
                        }
                    }
                    ?>>
                    <div class="switch">
                        <div class="base">
                            <div class="circulo">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="usuario"><!--imagen de sesion -->
                <?php
                if (!isset($_SESSION['usuario_email'])) {
                    echo "<img src='img/UNknownPerson.png' alt=''>";
                    echo "  <div class='info-usuario'>";
                    echo "      <div class='nombre-email'>";
                    echo "          <span class='nombre'>Desconocido</span>";
                } elseif (isset($_SESSION['usuario_email'])) {
                    if (isset($_SESSION['imagen'])) {
                        echo "<img src=' ", $_SESSION['imagen'], "' alt=''>";
                    } elseif (!isset($_SESSION['imagen'])) {
                        echo "<img src='img/UNknownPerson.png ' alt=''>";
                    }
                    echo "  <div class='info-usuario'>";
                    echo "      <div class='nombre-email'>";
                    echo "          <span class='nombre'>", $_SESSION['usuario'], "</span>";
                    echo "          <span class='email'>", $_SESSION['usuario_email'], "</span>";
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