<?php
require_once "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos de Música</title>
    <link rel="stylesheet" href="includes/css/agregarp.css">
    
   <style>
       
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Oswald", sans-serif;
    
}
body{
    height: 100vh;
    width: 100%;
    background-color: var(--letra-c);
   
}
/* colores para la pagina */
:root{
  --barra-lateral:#150909;
  --texto1: #f8f3ee;
  --texto:#efdfd2;
  --letra-c: #e0c1a8;
  --letra-co: #ce9a76;
  --fondo: #be7951;
  --buttom: #af6643;
  --fondo2: #974e37;
  --fondo3: #885550;
  --fondo4: #66322d;
   --texto-o: #582c2b; 
}
.dark-mode{
    /* no descubri para que servia este color o donde se aplicaba------(criis)*/
    --barra-lateral:#ffffff;
    /* el color que se muestra al pasar el cursor a un boton en la barra lateral------(criis)*/
    --texto1:#70477c ;
    /* color de las letras principales de la pagina------(criis)*/
    --texto: #ffffff;
    /* color de fondo de la pagina*------(criis)*/
    --letra-c:#1e0922;
   /* color de fondo del boton para poner el modo claro denuevo------(criis)*/
    --letra-co:#b700ff;
   /* color de fondo de la barra lateral------(criis)*/
    --fondo:#300a38;
   /* color de fondo de los botones: agregar,entrar------(criis)*/
    --buttom:#5a036b;
    /* no descubri para que servia este color o donde se aplicaba------(criis)*/
    --fondo2:#ff00d4 ;
    /*no descubri para que servia este color o donde se aplicaba------(criis) */
    --fondo3:#7a0991;
    /* color de fondo de el contenedor de inciar sesion------(criis)*/
    --fondo4:#3d124e;
   /* color de la bolita para activar y desactivar modo oscuro------(criis)*/
     --texto-o:#130022 ;
}
/* menu para pantallas pequeñas */
.menu{
    position: fixed;
    width: 50px;
    height: 50px;
    font-size: 30px;
    display: none;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    cursor: pointer;
    background-color:var(--buttom);
    color: var(--barra-lateral);
    right: 15px;
    top: 15px;
    z-index: 100;
}
/* menu normal para pc */
.barra-lateral{
    position: fixed;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 250px;
    height: 100%;
    overflow: hidden;
    padding: 20px 15px;
    background-color: var(--fondo);
    color: var(--letra-c);
    transition: width 0.5s ease,background-color 0.3s ease,left 0.5s ease;
    z-index: 50;
    
}
.mini-barra-lateral{
width: 80px;
}
.barra-lateral  span{
    width: 100px;
    white-space: nowrap;
    font-size: 18px;
    text-align: left;
    opacity: 1;
    transition: opacity 0.5s ease,width 0.5s ease;
}

.barra-lateral  span.oculto{
  opacity: 0;  
  width: 0;
}

/* parte del nombre de la pagina */
.barra-lateral .n-pagina{
    
    width: 100%;
    height: 45px;
    margin-bottom: 40px;
    display: flex;
    align-items: center;
}
.barra-lateral .n-pagina ion-icon{
    
    min-width:50px ;
    font-size: 40px;
    cursor: pointer;
}
.barra-lateral .n-pagina span{
    margin-left: 5px;
    font-size: 25px;
}

/* creamos boton para agregar algo nuevo */
.barra-lateral .boton{
   width: 100%;
    height: 45px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 10px;
    background-color: var(--buttom);
    color: var(--texto);
}
.barra-lateral .boton ion-icon{
min-width: 50px;
font-size: 25px;
}


/*------------------------------> Menu Navegador*/
.barra-lateral .navegacion{
    height: 100%;
    overflow-y: auto;
    overflow-x: hidden;
}
.barra-lateral .navegacion::-webkit-scrollbar{
    width: 5px;
}
.barra-lateral .navegacion::-webkit-scrollbar-thumb{
    background-color: var(--letra-co);
    border-radius: 5px;
}
.barra-lateral .navegacion::-webkit-scrollbar-thumb:hover{
    background-color: var(--fondo);
}
.barra-lateral .navegacion li{
    list-style: none;
    display: flex;
    margin-bottom: 5px;
}
.barra-lateral .navegacion a{
    width: 100%;
    height: 45px;
    display: flex;
    align-items: center;
    text-decoration: none;
    border-radius: 10px;
   
    color: var(--texto);
}
.barra-lateral .navegacion a:hover{
    background-color: var(--texto1);
    color: var(--texto-o);/*colores barra lateral*/
}
.barra-lateral .navegacion ion-icon{
    min-width: 50px;
    font-size: 20px;
}

/*-------------------> Linea*/
.barra-lateral .linea{
    width: 100%;
    height: 1px;
    background-color: var(--fondo4);
    margin-top: 15px;
}  

/*-------------------------> Modo Oscuro*/
.barra-lateral .modo-oscuro{
    width: 100%;
    border-radius: 10px;
    margin-bottom: 45px;
    display: flex;
    justify-content: space-between;
    
}
.barra-lateral .modo-oscuro .info{
    width: 150px;
    height: 45px;
    overflow: hidden;
    display: flex;
    align-items: center;
    color: var(--texto);
}
.barra-lateral .modo-oscuro ion-icon{
    width: 50px;
    font-size: 20px;
}

/*----------------------------> switch*/
.barra-lateral .modo-oscuro .switch{
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 50px;
    height: 45px;
    cursor: pointer;
}
.barra-lateral .modo-oscuro .base{
    position: relative;
    display: flex;
    align-items: center;
    width: 35px;
    height: 20px;
    background-color: var(--letra-co);
    border-radius: 50px;
}
.barra-lateral .modo-oscuro .circulo{
    position: absolute;
    width: 18px;
    height: 90%;
    background-color:var(--texto-o);
    border-radius: 50%;
    left: 2px;
    transition: left 0.5s ease;
}
.barra-lateral .modo-oscuro .circulo.prendido{
    left: 15px;
}
/*-----------------------------> usuario*/
.barra-lateral .usuario{
  width: 100%;
  display: flex;
}
.barra-lateral .usuario img{
  width: 50px;
  min-width: 50px;
  border-radius: 10px;
}
.barra-lateral .usuario .info-usuario{
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: var(--texto);
  overflow: hidden;
}
.barra-lateral .usuario .nombre-email{
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-left: 5px;
}
.barra-lateral .usuario .nombre{
  font-size: 15px;
  font-weight: 600;
}
.barra-lateral .usuario .email{
  font-size: 13px;
}
.barra-lateral .usuario ion-icon{
  font-size: 20px;
}
main{
    margin-left: 250px;
    padding: 20px;
    transition: margin-left 0.5s ease;
}
main.min-main{
    margin-left: 80px;
}



/*------------------> Responsive*/
@media (max-height: 660px){
    .barra-lateral .nombre-pagina{
        margin-bottom: 5px;
    }
    .barra-lateral .modo-oscuro{
        margin-bottom: 3px;
    }
}
@media (max-width: 600px){
    .barra-lateral{
        position: fixed;
        left: -250px;
    }
    .max-barra-lateral{
        left: 0;
    }
    .menu{
        display: flex;
    }
    .menu ion-icon:nth-child(2){
        display: none;
    }
    main{
        margin-left: 0;
    }
    main.min-main{
        margin-left: 0;
    }
    
}
/* boton de busqueda */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px; 
    margin-bottom: 50px;
}

.container input[type="text"] {
    width: 200px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 5px; 
}

.container .btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px; 
    height: 40px; 
    background-color: var(--buttom); 
    border-radius: 5px;
    cursor: pointer;
    border: none;
}

/* Incertamos el carrusel */

.swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 250px;
    margin-top: 50px;
    height: 350px;
    margin-left: 20px;
    border-radius: 12px;
    background-color: var(--fondo3);
    margin-bottom: 70px;
  }
  
  
  img {
      max-width: 100%;
    }
    
  
    
    .player {
      width: 250px;
      height: 350px;
      background-color: var(--background);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-radius: 12px;
      box-shadow: 9px 9px 16px rgba(163, 177, 198, 0.6),
        -9px -9px 16px rgba(255, 255, 255, 0.5);
    }
    
    .player__controls {
      display: flex;
      width: 95%;
      justify-content: space-evenly;
      align-items: center;
      margin-top: -35px;
    }
    
    .player__btn {
      cursor: pointer;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: -8px -8px 20px 0px #fff9, -6px -6px 6px 0px #fff9,
        8px 8px 20px #0001, 5px 5px 6px 0px #0001;
      color: var(--gray);
    }
    
    .player__btn:active {
      box-shadow: inset -8px -8px 20px #fff9, inset -5px -5px 6px #fff9,
        inset 8px 8px 20px #0003, inset 5px 5px 6px #0001;
    }
    
    .player__btn--small {
      min-width: 33px;
      min-height: 33px;
      margin-top: 22px;
    }
    
    .player__title {
      font-weight: 600;
      font-size: 0.8em;
      color: #a1a1a1;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin: 5px;
    }
    
    .player__album {
      width: 115px;
    }
    
    .player__img {
      border-radius: 10%;
      box-shadow: 2px 2px 7px rgb(163, 177, 198), -2px -2px 7px rgb(163, 177, 198),
        -8px -8px 50px rgba(255, 255, 255, 0.8), 3px 3px 25px rgba(0, 0, 0, 0.6);
    }
    
    .player__artist {
      font-size: 1.2em;
      font-weight: 500;
      opacity: 0.5;
      margin: 20px 0px 0px 0px;
    }
    
    .player__song {
      position: relative;
      width: 100%;
      text-align: center;
      font-weight: 400;
      font-size: 1em;
      opacity: 0.5;
      margin: 0;
    }
    
    .player__level {
      width: 80%;
      -webkit-appearance: none;
      outline: none;
      border: none;
      padding: 0;
      margin-top: 40px;
    }
    
    .player__level::-webkit-slider-runnable-track {
      background-color: #d7dbdd;
      height: 6px;
      border-radius: 3px;
    }
    
    .player__level::-webkit-slider-thumb {
      -webkit-appearance: none;
      border-radius: 100%;
      background-color: #5c87fe;
      height: 18px;
      width: 18px;
      margin-top: -7px;
    }
    
    .start {
      flex: 1;
    }
    
    .player__audio {
      visibility: hidden;
    }
    
    .player__btn--medium {
      min-height: 33px;
      min-width: 33px;
    }
    
    .blue {
      background-color: #5c87fe;
      color: #fff;
    }
    
    .hide {
      display: none;
    }
    
    .player__menu {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      display: none;
    }
    
    .player__menu ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .player__menu li {
      margin-bottom: 10px;
      text-align: center;
    }
    
  /* Se modifica el tamaño de la imagen del artista */
  .i-ar{
    background-color: var(--fondo3);
    width: 400px;
    height: 150px;
    border-radius: 10px;
    
  }
  .p-a {
    margin-left: 10px;
    border-radius: 100%;
    margin-top: 10px;
    width: 100px;
}
.n-ar{
    margin-left: 150px;
    margin-bottom: 50px;
    margin-top: -95px;
}

/* Styles for Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.agregar{
  text-decoration: none; 
  color: inherit; 
  margin-top: -2px;
}
    </style>
</head>
<body>
<div class="container mt-5">
        <h2 class="text-center mb-4">Formulario de Música</h2>
        <form action="conexion.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Nombre de la Canción:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Artista:</label>
                    <input type="text" class="form-control" id="artista" name="artista" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="album" class="form-label fw-bold">Álbum:</label>
                    <input type="text" class="form-control" id="album" name="album" required>
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Género:</label>
                    <input type="text" class="form-control" id="genero" name="genero" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Imagen: </label>
                    <input type="text" class="form-control" id="imagen" name="imagen" required>
                </div>
                <div class="col-md-6">
                    <label for="anio" class="form-label fw-bold">Año de Lanzamiento:</label>
                    <input type="number" class="form-control" id="anio" name="anio" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            
        </form>

    </div>
</div>


        <h2 class="text-center mt-5">Listado de Canciones</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="mx-auto p-2 card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4" style="overflow: hidden;">
            <img src="" class="img-fluid rounded-start" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Artista: </p>
                <p class="card-text">Álbum: </p>
                <p class="card-text">Género: </p>
                <p class="card-text">Año: </p>
       
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<?php
require_once "includes/footer.php";
?> 
</html>
