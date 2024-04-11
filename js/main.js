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