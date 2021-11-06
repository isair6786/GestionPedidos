/* VARIABLES*/
const Switch = document.querySelector('#customSwitches');
const SwitchText = document.querySelector('#SwitchName');
const btnEliminarProducto = document.querySelector('#btnEliminarProducto');

/*INICIALIZACIONES*/
window.addEventListener("DOMContentLoaded", () => {
    if (Switch.checked == true) {

        SwitchText.classList.add("text-primary");
        SwitchText.innerHTML = "Activo"


    } else {
        SwitchText.classList.remove("text-primary");
        SwitchText.innerHTML = "Inactivo"
    }


})


/* FUNCIONES */
Switch.addEventListener("click", () => {
    if (Switch.checked == true) {

        SwitchText.classList.add("text-primary");
        SwitchText.innerHTML = "Activo"


    } else {
        SwitchText.classList.remove("text-primary");
        SwitchText.innerHTML = "Inactivo"
    }
})

function Eliminar(id) {
    const FormEliminar = document.querySelector('#FormEliminar' + id);

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Quieres eliminar el producto?',
        text: "Esta accion no puede revertirse",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, quiero eliminarlo!',
        cancelButtonText: 'No, Cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            FormEliminar.submit();
        } else if (

            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
}

function MostrarModalEditar(id) {

}