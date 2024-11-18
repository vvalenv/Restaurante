// MENU DESPLEGABLE

const btnmenu = document.querySelector("#btnmenu");
const menu = document.querySelector("#menu");

btnmenu.addEventListener("click", function(){
    menu.classList.toggle("mostrar");
});

const submenubtn = document.querySelectorAll(".submenu-btn");
for(let i=0; i<submenubtn.length; i++) {
    submenubtn[i].addEventListener("click", function() {
        if (window.innerWidth < 800) {
            const submenu = this.nextElementSibling;
            const height_submenu = submenu.scrollHeight;
            if (submenu.classList.contains("desplegar")){
                submenu.classList.remove("desplegar");
                submenu.removeAttribute("style");
            } else {
             submenu.classList.add("desplegar");
             submenu.style.height = height_submenu + "px";
        } 
    }
    });
}

// CREACION DE REGISTRO

const mostrarRegistro = document.getElementById('register-text');
mostrarRegistro.addEventListener("click", function(){
    let titulo = document.getElementById("login-p");
    titulo.textContent="Registrarse";
    var contenedor = document.getElementById('div-login');
    let formLogin = document.getElementById('form-login');
    contenedor.removeChild(mostrarRegistro);
    contenedor.removeChild(formLogin);
    contenedor.style.height = "550px";
    var mostrarLogin = document.createElement("div");
    mostrarLogin.setAttribute("id", "register-text");
    mostrarLogin.setAttribute("class", "register-text");
    mostrarLogin.setAttribute("onclick", "recargar()");
    mostrarLogin.innerHTML = "¿Ya estas registrado?";

    var formRegister = document.createElement("form");
    formRegister.setAttribute("id", "form-register");
    formRegister.setAttribute("class", "form-register");
    formRegister.setAttribute("action", "registrarUsuario");
    formRegister.setAttribute("method", "POST");

    contenedor.appendChild(formRegister);
    contenedor.appendChild(mostrarLogin);

    let inputName = document.createElement("input");
    inputName.setAttribute("id", "input-name");
    inputName.setAttribute("class", "input-name");
    inputName.setAttribute("name", "nombre_usuario");
    inputName.setAttribute("type", "text");
    inputName.setAttribute("placeholder", "Ingresar nombre de usuario");
    inputName.required = "true";
    
    let labelName = document.createElement("label");
    labelName.setAttribute("for", "input-name");
    labelName.innerHTML = "Ingresa nombre de usuario";

    let inputContra = document.createElement("input");
    inputContra.setAttribute("id", "input-contra");
    inputContra.setAttribute("class", "input-contra");
    inputContra.setAttribute("name", "contra");
    inputContra.setAttribute("type", "password");
    inputContra.setAttribute("placeholder", "Ingresar contraseña:");
    inputContra.required = "true";
    
    let labelContra = document.createElement("label");
    labelContra.setAttribute("for", "input-contra");
    labelContra.innerHTML = "Ingresa contraseña:";

    let inputContra2 = document.createElement("input");
    inputContra2.setAttribute("id", "input-contra2");
    inputContra2.setAttribute("class", "input-contra2");
    inputContra2.setAttribute("name", "contra2");
    inputContra2.setAttribute("type", "password");
    inputContra2.setAttribute("placeholder", "Confirmar contraseña");
    inputContra2.required = "true";
    
    let labelContra2 = document.createElement("label");
    labelContra2.setAttribute("for", "input-contra2");
    labelContra2.innerHTML = "Vuelva a ingresar contraseña:";

    let submit = document.createElement("input");
    submit.setAttribute("id", "submit-registro");
    submit.setAttribute("class", "submit-registro");
    submit.setAttribute("name", "submit-registro");
    submit.setAttribute("type", "submit");
    submit.setAttribute("value", "Registrarse");

    let inputMail = document.createElement("input");
    inputMail.setAttribute("id", "input-mail");
    inputMail.setAttribute("class", "input-mail");
    inputMail.setAttribute("name", "email");
    inputMail.setAttribute("type", "email");
    inputMail.setAttribute("placeholder", "Ingresar mail");
    
    let labelMail = document.createElement("label");
    labelMail.setAttribute("for", "input-mail");
    labelMail.innerHTML = "Ingresar email";

    formRegister.appendChild(labelName);
    formRegister.appendChild(inputName);

    formRegister.appendChild(labelMail);
    formRegister.appendChild(inputMail);

    formRegister.appendChild(labelContra);
    formRegister.appendChild(inputContra);

    formRegister.appendChild(labelContra2);
    formRegister.appendChild(inputContra2);
    formRegister.appendChild(submit);
});

const submit = document.getElementById('submit-registro');
submit.addEventListener("click", function() {
    let contra = document.getElementById('input-contra');
    let contra2 = document.getElementById('input-contra2');

    if (contra.value != contra2.value) {
        evt.preventDefault();
        alert('bro, las contraseñas tienen que ser iguales');
    }
});

// RECARGA PARA QUE VUELVA AL LOGIN 

function recargar() {
    location.reload();
}