function LanzarModalEliminar(tipo, Titulo, Mensaje, id) {
    Swal.fire(
        Titulo,
        Mensaje,
        tipo
    )
    Swal.fire({
        title: Titulo,
        text: Mensaje,
        icon: tipo,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si Eliminar el procucto'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace("Login.php?Pagina=Dashboard&Modulo=Productos&Accion=Eliminar&Id=" + id)
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
        window.location.replace("Login.php?Pagina=Dashboard&Modulo=Productos")
    }, 1500)
}