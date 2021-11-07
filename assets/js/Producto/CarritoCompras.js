/*INICIALIZANDO*/
const lblContadorAlertas = document.querySelector("#ContadorAlertas");

document.addEventListener("DOMContentLoaded", () => {
    MostrarCantidadProductos();

})

/*Funciones */

function MostrarCantidadProductos() {
    if (JSON.parse(localStorage.getItem("Carrito")) == null) {
        lblContadorAlertas.innerHTML = ""
    } else {
        lblContadorAlertas.innerHTML = Object.keys(JSON.parse(localStorage.getItem("Carrito"))).length
    }
}

function AddCarrito(idProducto, PrecioProducto) {
    const Cantidad = document.querySelector("#txtCantidadId" + idProducto);
    const Descripcion = document.querySelector("#txtDescripcionId" + idProducto);
    CrearCarrito();
    //Validamos la cantidad total en carrito
    if (ValidarCantidadEnCarrito(parseInt(Cantidad.value), "Item" + idProducto)) {
        if (Cantidad > 20) {
            alert('Solo Puedes hacer pedidos de un Maximo de 20 unidades por total');
            return;
        }
        //Seleccionamos los datos
        var datos = {
            "Cantidad": parseInt(Cantidad.value),
            "Precio": PrecioProducto,
            "Descripcion": Descripcion.value,
        }

        var Carrito = JSON.parse(localStorage.getItem("Carrito"));
        Carrito["Item" + idProducto] = datos;
        localStorage.setItem("Carrito", JSON.stringify(Carrito))
    }
    MostrarCantidadProductos()
}

function CrearCarrito() {
    var Carrito = JSON.parse(localStorage.getItem("Carrito"));
    if (Carrito == null) {
        localStorage.setItem("Carrito", JSON.stringify({}));
    }
}

function LimpiarCarrito() {
    var Carrito = JSON.parse(localStorage.getItem("Carrito"));
    if (Carrito != null) {
        localStorage.removeItem("Carrito");
    }
}


/*VALIDACIONES===================*/

function ValidarCantidadEnCarrito(Cantidad, Item) {
    let CantidadValida = true;
    let CantidadEnCarrito = 0;

    //Si el carrito esta vacio se retorna el metodo
    var Carrito = JSON.parse(localStorage.getItem("Carrito"));

    //Sino esta vacio, Sumamos las cantidades existentes
    for (var key in Carrito) {
        CantidadEnCarrito = CantidadEnCarrito + Carrito[key]["Cantidad"];
    }

    //validamos si ya existe el producto en el carrito, validamos que la cantidad que se quiere cambiar sume menos que 21
    if (Carrito[Item] != null && ((CantidadEnCarrito - Carrito[Item]["Cantidad"]) + Cantidad) < 21) {
        return CantidadValida;
    } else {
        if ((CantidadEnCarrito + Cantidad) > 20) {
            MostrarAlerta('No se pudo agregar al carrito!',
                'La cantidad de productos totales debe ser menor a 21\nLa cantidad total actual  es ' +
                CantidadEnCarrito + ", Agrege menos productos de " + Carrito[Item]["Descripcion"],
                'info')
            CantidadValida = false
            return CantidadValida;
        } else {
            return CantidadValida;
        }
    }



}

function MostrarAlerta(Titulo, Cuerpo, Tipo) {
    Swal.fire(
        Titulo,
        Cuerpo,
        Tipo
    )
}

function VerPreviadeCarrito() {
    var DetalleCarrito = document.querySelector("#ItemsCarrito");
    var Carrito = JSON.parse(localStorage.getItem("Carrito"));
    var btnVerCarrito = document.createElement('a')
    var ContenedorItem = document.createElement('div');

    //Creando Boton 
    btnVerCarrito.classList.add("dropdown-item", "text-center", "small", "text-gray-500")
    btnVerCarrito.setAttribute('href', 'Login.php?Pagina=Dashboard&Modulo=Productos')
    btnVerCarrito.innerText = "Mostrar todo el carrito";


    //Añadiendo atributo al contenedor del detalle de carrito
    DetalleCarrito.innerHTML = "";
    DetalleCarrito.innerHTML = `
        <h6 class="dropdown-header">
        Carro de Compras
        </h6>
        `;
    if (Carrito != null) {
        //Validamos que si el carrito tiene mas de dos items
        if ((Object.keys(Carrito).length) > 3) {
            for (var contador = 1; contador < 3; contador++) {
                var Item = document.createElement('div');
                Item.classList.add("dropdown-item", "d-flex", "align-items-center");
                Item.innerHTML = `
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">${Carrito[(Object.keys(Carrito)[contador])]["Cantidad"]}</div>
                    <span class="font-weight-bold">Price : $ ${Carrito[(Object.keys(Carrito)[contador])]["Precio"]}</span>
                </div>
                `;
                ContenedorItem.append(Item);
            }
        } else {
            for (var key in Carrito) {
                var Item = document.createElement('div');
                Item.classList.add("dropdown-item", "d-flex", "align-items-center");
                Item.innerHTML = `
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="text-dark-500">${Carrito[key]["Descripcion"]}</div>
                    <div class="text-gray-500">Cantidad:  ${Carrito[key]["Cantidad"]}</div>
                    <span class="font-weight-bold">Precio : $ ${Carrito[key]["Precio"]}</span>
                </div>
                `;
                ContenedorItem.append(Item);
            }
        }


    } else {
        ContenedorItem.innerHTML = `
        <div class="text-dark-500 px-4 pt-2 pb-2">No hay productos</div> `;
    }
    DetalleCarrito.appendChild(ContenedorItem);
    DetalleCarrito.appendChild(btnVerCarrito);



}

/*

<div class="mr-3">
    <div class="icon-circle bg-primary">
        <i class="fas fa-file-alt text-white"></i>
    </div>
</div>
<div>
    <div class="small text-gray-500">Item</div>
    <span class="font-weight-bold">Price : $$</span>
</div>
*/