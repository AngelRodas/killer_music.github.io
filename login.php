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
    <link rel="stylesheet" href="includes/css/styles.css">
    <title>BeatBoddy</title>
    <link rel="icon" href="img/vectorLogoEpico21.svg">
</head>
<body>
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
    <script src="includes/js/lo.js"></script>

</main>
<?php 
require_once "includes/footer.php";
?>
</body>
</html>