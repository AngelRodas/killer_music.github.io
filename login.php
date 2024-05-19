<?php
    require_once "includes/header.php"; 
    $conn = Cconexion::ConexionDB();

    
    if(isset($_POST['registrar'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contrasena'];
        $apellido = $_POST['Apellido'];
        $imagen = $_POST['imagen']; 

        if(strlen($nombre)>0 && strlen($apellido)>0 && strlen($correo)>0 && strlen($usuario)>1 && strlen($contraseña)>1){
            
            $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
            $insertUsuarioNuevo = $conn->prepare("INSERT INTO Usuario (UserName, email, Nombre, Apellido, Password, Imagen) values (?,?,?,?,?,?)", $options);

            if($insertUsuarioNuevo->execute(array($usuario, $correo, $nombre, $apellido, $contraseña, $imagen))) {
                echo "Usuario registrado exitósamente";
                
            } else {
                echo "Error: " . $insertUsuarioNuevo->error;
            }            
            unset($insertUsuarioNuevo);
            unset($conn);
        }
    } else if(isset($_POST['login'])){
        $correo = $_POST['correo'];
        $contraseña = $_POST['contrasena'];
        
        $logincorrecto = false;

        if(strlen($correo)>0 && strlen($contraseña)>0){
           $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
           $query = "SELECT email, Password, UserName, Imagen, EsAdmin FROM Usuario where email = ?";
           $selectUsuario = $conn->prepare($query,$options);
           $selectUsuario->execute(array($correo));

        while($row = $selectUsuario->fetch(PDO::FETCH_ASSOC)){
                if("$row[Password]"==$contraseña){
                    //Establecer variables de sesion (username, etc.)
                    $logincorrecto = true;
                    //hacer redireccion con location para ir a index
                    $_SESSION['usuario_email'] = $correo; 
                    $_SESSION['usuario']= "$row[UserName]";
                    $_SESSION['EsAdmin']= "$row[EsAdmin]";
                    
                    if(strlen("$row[Imagen]")>0){
                        $_SESSION['imagen'] ="$row[Imagen]";
                    }
                    header("Location: ini.php");
                    break;

              } 
                else {
                    echo "Usuario no válido";
                }
           }
        }
        echo $logincorrecto;
    }

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
                <p>Inicia sesion para entrar a la pagina</p>
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
                <h2>Iniciar sesion</h2>
                <input type="text" placeholder="Correo Electronico" name="correo">
                <input type="password" placeholder="contraseña" name="contrasena">
                <button type="submit" name="login" value="login">entrar</button>
            </form>

            <form action="" method="POST" class="formulario__register">
                <h2>registrarse</h2>
                <input type="text" placeholder="Nombre" name="nombre">
                <input type="text" placeholder="Apellido" name="Apellido">
                <input type="text" placeholder="correo Electronico" name="correo">
                <input type="text" placeholder="usuario" name="usuario">
                <input type="password" placeholder="contraseña" name="contrasena">
                <input type="text" placeholder="imagen" name="imagen">
                <button type="submit" name="registrar" value="registrarse">Registrarse</button>
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