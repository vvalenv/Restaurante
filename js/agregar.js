// FORMULARIO PARA AGREGAR PRODUCTOS

const btnAgregarP = document.getElementById('agregarbtn');
const formAgregarP = document.getElementById('div-agregar-p');
btnAgregarP.addEventListener("click", function(){
    formAgregarP.style.display="flex";
    btnAgregarP.style.display="none";
});

const btnVolver = document.getElementById('btn-volver');
btnVolver.addEventListener("click", function(){
    formAgregarP.style.display="none";
    btnAgregarP.style.display="grid";
});
