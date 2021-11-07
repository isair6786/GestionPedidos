/* CONSTANTES*/
const txtUsuario = document.querySelector("#txtUsuario");
const txtPassword = document.querySelector("#txtPassword");
const txtCorreo = document.querySelector("#txtCorreo");
const txtNombres = document.querySelector("#txtNombres");
const txtApellidos = document.querySelector("#txtApellidos");
const txtDireccion = document.querySelector("#txtDireccion");
const txtTelefono = document.querySelector("#txtTelefono");
const txtDui = document.querySelector("#txtDui");
const btnRegistrar = document.querySelector("#btnRegistrar");
const RegEx = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
const RegExDui = /\d{8}-\d{1}/;
const RegExTelefono = /\d{4}\-\d{4}/;

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
    if (e.target.id == "txtDui") {
        ValidarDui(e);
    }
    if (e.target.id == "txtTelefono") {
        ValidarTelefono(e);
    }

    if (e.target.id == "txtCorreo") {
        ValidarEmail(e);
    }
    if (RegEx.test(txtCorreo.value) && RegExDui.test(txtDui.value) && RegExTelefono.test(txtTelefono.value) && txtUsuario.value != '' && txtPassword.value != '' &&
        txtCorreo.value != '' && txtNombres.value != '' && txtApellidos.value != '' &&
        txtDireccion.value != '' && txtTelefono.value != '' && txtDui.value != ''
    ) {
        btnRegistrar.disabled = false;
        btnRegistrar.style.cursor = "pointer"

    }

}

function ValidarDui(e) {
    if (RegExDui.test(e.target.value)) {
        e.target.classList.remove("border", "border-danger");
        e.target.classList.add("border", "border-success");
        QuitarError(e);

    } else {
        e.target.classList.remove("border", "border-success");
        e.target.classList.add("border", "border-danger");
        MostrarError("Digite un Telefono valido", e);

    }
}

function ValidarEmail(e) {
    if (e.target.value.length > 0) {
        if (RegEx.test(e.target.value)) {
            e.target.classList.remove("border", "border-danger");
            e.target.classList.add("border", "border-success");
            QuitarError(e);
        } else {
            e.target.classList.remove("border", "border-success");
            e.target.classList.add("border", "border-danger");
            MostrarError("Ingrese un Email Valido", e);

        }
    } else {
        e.target.classList.remove("border", "border-success");
        e.target.classList.add("border", "border-danger");
        MostrarError("El campo es obligatorio", e);
    }
}

function ValidarTelefono(e) {
    if (RegExTelefono.test(e.target.value)) {
        e.target.classList.remove("border", "border-danger");
        e.target.classList.add("border", "border-success");
        QuitarError(e);

    } else {
        e.target.classList.remove("border", "border-success");
        e.target.classList.add("border", "border-danger");
        MostrarError("Digite un teléfono valido", e);

    }
}

function MostrarError(error, e) {
    const CampoValidacion = document.querySelector("#Validacion" + e.target.id);
    CampoValidacion.innerHTML = error;
    IniciarApp()
}

function QuitarError(e) {
    const CampoValidacion = document.querySelector("#Validacion" + e.target.id);
    CampoValidacion.innerHTML = "";
}

/*FUNCIONES*/
function IniciarApp() {
    btnRegistrar.disabled = true;
    btnRegistrar.style.cursor = "not-allowed"
}

function EventListeners() {
    document.addEventListener("DOMContentLoaded", IniciarApp);
    txtUsuario.addEventListener('blur', ValidarFormulario);
    txtPassword.addEventListener('blur', ValidarFormulario);
    txtUsuario.addEventListener('blur', ValidarFormulario);
    txtUsuario.addEventListener('blur', ValidarFormulario);
    txtCorreo.addEventListener('blur', ValidarFormulario);
    txtNombres.addEventListener('blur', ValidarFormulario);
    txtApellidos.addEventListener('blur', ValidarFormulario);
    txtDireccion.addEventListener('blur', ValidarFormulario);
    txtDui.addEventListener('blur', ValidarFormulario);
    txtTelefono.addEventListener('blur', ValidarFormulario);

}

//Modales
function LanzarModal(tipo, Titulo, Mensaje) {
    Swal.fire(
        Titulo,
        Mensaje,
        tipo
    )
    setTimeout(() => {
        window.location.replace("Login.php")
    }, 3500)
}