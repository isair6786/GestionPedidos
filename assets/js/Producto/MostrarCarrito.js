/*INICIALIZANDO*/
const ContenedorCarrito = document.querySelector("#DetalleCarrito");
const DatosDelCarrito = document.querySelector("#DatosDelCarrito");

document.addEventListener("DOMContentLoaded", () => {
    MostrarCarrito();
    AsignarDatosDelCarrito()

})

/*Funciones */
function AsignarDatosDelCarrito() {
    var Carrito = JSON.parse(localStorage.getItem(NombreCarrito));
    if (Carrito != null) {
        DatosDelCarrito.value = JSON.stringify(Carrito);
    } else {
        DatosDelCarrito.value = "";
    }

}

function MostrarCarrito() {

    var Carrito = JSON.parse(localStorage.getItem(NombreCarrito));

    if (Carrito != null) {
        //Validamos que si el carrito tiene mas de dos items
        ContenedorCarrito.innerHTML = '';
        for (var contador = 0; contador < Object.keys(Carrito).length; contador++) {
            var Botones = document.createElement('td');
            Botones.innerHTML = `
            <div class="btn-group" role="group" aria-label="Basic example">
                   <button class="btn btn-danger mr-1 rounded" onclick="EliminarDelCarrito('${(Object.keys(Carrito)[contador])}')">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
            </div> 
        
            `;
            var Item = document.createElement('tr');

            Item.innerHTML = `
                    
                    <td class="text-dark-500">${Carrito[(Object.keys(Carrito)[contador])]["Descripcion"]}</td>
                    <td class="text-gray-500"> ${Carrito[(Object.keys(Carrito)[contador])]["Cantidad"]}</td>
                    <td class="font-weight-bold"> $ ${Carrito[(Object.keys(Carrito)[contador])]["Precio"]}</td>

                `;
            Item.appendChild(Botones)

            ContenedorCarrito.appendChild(Item);
        }

    } else {
        ContenedorCarrito.innerHTML = `
        <div class="text-dark-500 px-4 pt-2 pb-2">No hay productos</div> `;
    }
    AsignarDatosDelCarrito();
}

function EliminarDelCarrito(Item) {
    var Carrito = JSON.parse(localStorage.getItem(NombreCarrito));

    Swal.fire({
        title: 'Estas Seguro?',
        text: "Se eliminará del carrito el producto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si , deseo quitarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            delete Carrito[Item];
            localStorage.setItem(NombreCarrito, JSON.stringify(Carrito))
            MostrarCarrito();
            AsignarDatosDelCarrito();
            MostrarCantidadProductos();

        }
    })

}


/*VALIDACIONES===================*/


function MostrarAlerta(Titulo, Cuerpo, Tipo) {
    Swal.fire(
        Titulo,
        Cuerpo,
        Tipo
    )
}

function LimpiarCarritoCompras() {
    var Carrito = JSON.parse(localStorage.getItem(NombreCarrito));
    if (Carrito != null) {
        localStorage.removeItem(NombreCarrito);
    }
    MostrarCarrito();
    AsignarDatosDelCarrito();

}

function LanzarModal(tipo, Titulo, Mensaje) {
    Swal.fire(
        Titulo,
        Mensaje,
        tipo
    )
    setTimeout(() => {
        window.location.replace("Login.php?Pagina=Dashboard&Modulo=Pedidos")
    }, 1500)
}