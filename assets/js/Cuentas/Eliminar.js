function LanzarModalEliminar(tipo, Titulo, Mensaje, id) {

    Swal.fire({
        title: Titulo,
        text: Mensaje,
        icon: tipo,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Desactivar la cuenta'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace("Login.php?Pagina=Dashboard&Modulo=Cuentas&Accion=Eliminar&Id=" + id)
        }
    })

}

function LanzarModalActivar(tipo, Titulo, Mensaje, id) {

    Swal.fire({
        title: Titulo,
        text: Mensaje,
        icon: tipo,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar la cuenta'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace("Login.php?Pagina=Dashboard&Modulo=Cuentas&Accion=Activar&Id=" + id)
        }
    })

}

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