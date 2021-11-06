/* CONSTANTES*/
const txtUsuario = document.querySelector("#txtUsuario");
const txtPassword = document.querySelector("#txtPassword");
const btnIngresar = document.querySelector("#btnIngresar");

/*INICIAR EVENTOS */
EventListeners();

/*VALIDACIONES*/
function ValidarFormulario(e) {


    if (e.target.value.length > 0) {
        e.target.classList.remove("border", "border-danger");
        e.target.classList.add("border", "border-success");
        QuitarError(e);

    } else {
        e.target.classList.remove("border", "border-success");
        e.target.classList.add("border", "border-danger");
        MostrarError("El campo es obligatorio", e);

    }

    if (txtUsuario.value != '' && txtPassword.value != '') {
        btnIngresar.disabled = false;
        btnIngresar.style.cursor = "pointer"

    }
}



function MostrarError(error, e) {
    const CampoValidacion = document.querySelector("#Validacion" + e.target.id);
    CampoValidacion.innerHTML = error;
}

function QuitarError(e) {
    const CampoValidacion = document.querySelector("#Validacion" + e.target.id);
    CampoValidacion.innerHTML = "";
}

/*FUNCIONES*/
function IniciarApp() {
    btnIngresar.disabled = true;
    btnIngresar.style.cursor = "not-allowed"
}

function EventListeners() {
    document.addEventListener("DOMContentLoaded", IniciarApp);
    txtUsuario.addEventListener('blur', ValidarFormulario);
    txtPassword.addEventListener('blur', ValidarFormulario);


}

/*Modal */
function LanzarModal(tipo, Titulo, Mensaje) {
    Swal.fire(
        Titulo,
        Mensaje,
        tipo
    )

}