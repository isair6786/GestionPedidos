/* CONSTANTES*/
const txtSaldoAumentar = document.querySelector("#txtSaldo");
const txtTarjeta = document.querySelector("#txtTarjeta");
const btnRegistrar = document.querySelector("#btnRegistrar");
const RegExTarjeta = /^[47][0-9]{14}$/;


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
    if (e.target.id == "txtTarjeta") {
        if (RegExTarjeta.test(e.target.value)) {
            e.target.classList.remove("border", "border-danger");
            e.target.classList.add("border", "border-success");
            QuitarError(e);

        } else {
            e.target.classList.remove("border", "border-success");
            e.target.classList.add("border", "border-danger");
            MostrarError("Digite una tarjeta VISA valida", e);

        }

    }
    if (txtSaldoAumentar.value != '' && txtTarjeta != '' && RegExTarjeta.test(txtTarjeta.value)) {
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

}

function EventListeners() {
    document.addEventListener("DOMContentLoaded", IniciarApp);
    txtTarjeta.addEventListener('blur', ValidarFormulario);
    txtSaldoAumentar.addEventListener('blur', ValidarFormulario);


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