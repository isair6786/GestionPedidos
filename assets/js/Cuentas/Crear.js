/* CONSTANTES*/
const txtSaldo = document.querySelector("#txtSaldo");
const btnRegistrar = document.querySelector("#btnRegistrar");
const Switch = document.querySelector('#customSwitch1');
const SwitchText = document.querySelector('#TextcustomSwitch1');


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

    if (txtSaldo.value != '') {
        btnRegistrar.disabled = false;
        btnRegistrar.style.cursor = "pointer"

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
    CambiarLetraSwitch();
}

function EventListeners() {
    document.addEventListener("DOMContentLoaded", IniciarApp);
    txtSaldo.addEventListener('blur', ValidarFormulario);
    Switch.addEventListener('click', CambiarLetraSwitch);

}

function CambiarLetraSwitch() {
    if (Switch.checked == true) {


        SwitchText.classList.add("text-primary");
        SwitchText.innerHTML = "Activo"


    } else {

        SwitchText.classList.remove("text-primary");
        SwitchText.innerHTML = "Inactivo"
    }
}

//Modales
function LanzarModal(tipo, Titulo, Mensaje) {
    Swal.fire(
        Titulo,
        Mensaje,
        tipo
    )
    setTimeout(() => {
        window.location.replace("Login.php?Pagina=Dashboard&Modulo=Cuentas")
    }, 1500)
}