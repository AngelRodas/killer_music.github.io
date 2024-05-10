const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const mo = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

menu.addEventListener("click", () => {
    barraLateral.classList.toggle("max-barra-lateral");
    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    } else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if (window.innerWidth <= 320) {
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span) => {
            span.classList.add("oculto");
        });
    }
});

mo.addEventListener("click", () => {
    let body = document.body;
    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click", () => {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span) => {
        span.classList.toggle("oculto");
    });
});


// carrusel 
// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    // Inicializa el Swiper con las opciones y el selector de clase correspondiente
    var swiper = new Swiper(".mySwiper", {
        // Resto de tus opciones de Swiper, como effect, grabCursor, etc.
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            depth: 500,
            modifier: 1,
            slidesShadows: true,
            rotate: 0,
            stretch: 0,
        },
    });
});




// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    // Obtén todos los elementos con la clase 'fa-heart'
    var heartIcons = document.querySelectorAll('.fa-heart');

    // Itera sobre cada icono de corazón
    heartIcons.forEach(function(heartIcon) {
        // Agrega un evento de clic a cada icono de corazón
        heartIcon.addEventListener('click', function() {
            // Alternar la clase 'far' (corazón vacío) y 'fas' (corazón lleno) en el icono
            this.classList.toggle('far');
            this.classList.toggle('fas');
        });
    });
});


function openEditar(event) {
    event.preventDefault(); // Evita que el enlace siga su comportamiento por defecto
    window.open(event.target.href, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=800,height=600');
}

// Get the modal
var modal = document.getElementById("myModal");

// Get all elements with class "modal-trigger"
var buttons = document.querySelectorAll(".modal-trigger");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Loop through each button and attach click event listener
buttons.forEach(function(button) {
  button.addEventListener("click", function() {
    modal.style.display = "block";
  });
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Event listener for Yes button
document.getElementById("yesBtn").addEventListener("click", function() {
  // Handle "Yes" action here
  console.log("Yes clicked");
  // You can put your logic to delete the song here
  modal.style.display = "none"; // Close the modal
});

// Event listener for No button
document.getElementById("noBtn").addEventListener("click", function() {
  // Handle "No" action here
  console.log("No clicked");
  modal.style.display = "none"; // Close the modal
});
