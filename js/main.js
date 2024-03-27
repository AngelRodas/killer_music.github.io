const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const mo=document.querySelector(".switch");

mo.addEventListener("click",()=>{
  let body =document.body;
  body. classList.toggle("dark-mode")   
})

cloud.addEventListener("click",()=>{

barraLateral.classList.toggle("mini-barra-lateral");
spans.forEach((span)=>{
    span.classList.toggle("oculto");
})

});
