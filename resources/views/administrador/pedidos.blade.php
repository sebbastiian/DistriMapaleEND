<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
    <link rel="stylesheet" href="\css\navegacionadmin.css">
    <link rel="stylesheet" href="/css/tarjetas.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    
</head>

<style>
    /* Agrega estos estilos en tu archivo de estilos CSS */
.card {
    width: 80%; /* Puedes ajustar el porcentaje según tus preferencias */
    margin: 0 auto; /* Centra la tarjeta horizontalmente */
    border: 1px solid #ddd; /* Añade un borde para mejorar la apariencia */
    border-radius: 8px; /* Añade bordes redondeados */
    padding: 15px; /* Añade un espacio interno */
    margin-bottom: 20px; /* Espaciado inferior entre tarjetas */
}

.card-header {
    background-color: #f2f2f2; /* Agrega un color de fondo para el encabezado */
    padding: 10px; /* Ajusta el espacio interno del encabezado */
    border-bottom: 1px solid #ddd; /* Línea separadora entre el encabezado y el cuerpo */
}

.card-body {
    margin-top: 10px; /* Ajusta el espacio superior del cuerpo */
}

/* Agrega más estilos según tus preferencias */

</style>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <div class="usuario">
                    <img id="cloud" src="\img\logomd.png" alt="">
                    <span style="margin-top: 3%;" >DistriMapale</span>
                </div>
            </div>
            <a class="creanuv" href="{{route('administrador.index')}}">
                <button class="boton">
                    <ion-icon name="add-outline"></ion-icon>
                    <span>Crear nuevo</span>
                </button>
            </a>

        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="{{route('administrador.inventario')}}">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span>Inventario</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.programaciones')}}">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <span>Cronograma</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.facturas')}}">
                        <ion-icon name="cash-outline"></ion-icon>
                        <span>Ventas</span>
                    </a>
                </li>
                <li>
                    <a id="inbox" href="{{route('administrador.proveedores')}}">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.pedidos')}}">
                        <ion-icon name="bag-add-outline"></ion-icon>
                        <span>Pedidos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.transportadores')}}">
                        <ion-icon name="man-outline"></ion-icon>
                        <span>Empleados </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.vehiculos')}}">
                        <ion-icon name="car-sport-outline"></ion-icon>
                        <span>Vehículos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.clientes')}}">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Clientes</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                
                <div class="switch">
                  
                </div>
            </div>

    
            <div class="usuario">
                <x-dropdown-link href="{{ route('profile.show') }}">
                    <img src="/img/perfil-de-usuario.avif" alt="">
                </x-dropdown-link>
                
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"> {{ Auth::user()->name }} {{ Auth::user()->apellido }}</span>
                        
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <button class="ver-mas" href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Salir') }}
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>


    <main>
        <div class="navegacion-admin">
            <div class="tittlee">
                <h2>Lista de Pedidos</h2>
                <div class="search-bar">
                    <input class="inputsrch" type="text" id="searchInput" placeholder="Buscar pedidos...">
                    <button class="search-botn" onclick="buscarPedidos()">Buscar</button>
                </div>
            </div>
        </div>
        <div class="color">
            <div class="titabl tabla-pedidos">
                <h1 style="margin-bottom: 7%">Listado de Pedidos</h1>
            </div>
            <div class="containerr">
                <div>
                    @foreach ($pedidos as $pedido)
                        <div class="card">
                            <div class="card-header">
                                Pedido #{{ $pedido->idpedido }}
                            </div>
                            <div class="card-body">
                                <p>Fecha y Hora: {{ $pedido->fechahora }}</p>
                                <p>Plazo de Entrega: {{ $pedido->plazoentrega }}</p>
    
                                <h5>Detalles del Producto:</h5>
                                <div>
                                    <h6>ID Detalle Pedido: {{ $pedido->iddetallepedido }}</h6>
                                    <h6>Nombre del Producto: {{ $pedido->descripcion }}</h6>
                                    <h6>Cantidad Solicitada: {{ $pedido->cantidadsolicitada }}</h6>
                                    <!-- Agrega más detalles del producto según sea necesario -->
                                </div>
    
                                <h5>Detalles del Proveedor:</h5>
                                <div>
                                    <h6>ID Proveedor: {{ $pedido->idproveedor }}</h6>
                                    <h6>Nombre: {{ $pedido->name }}</h6>
                                    <h6>Correo Electrónico: {{ $pedido->email }}</h6>
                                    <!-- Agrega más detalles del proveedor según sea necesario -->
                                </div>
    
                                <h5>Detalles del Administrador:</h5>
                                <div>
                                    <h6>ID Administrador: {{ $pedido->idadministrador }}</h6>
                                    <h6>Nombre: {{ $pedido->name }} {{ $pedido->apellido }}</h6>
                                    <h6>Correo Electrónico: {{ $pedido->email }}</h6>
                                    <!-- Agrega más detalles del administrador según sea necesario -->
                                </div>
    
                                <!-- Puedes agregar más secciones con detalles adicionales -->
    
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    
    
    <script>
        function buscarProveedores() {
            var input, filter, cards, card, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            cards = document.querySelectorAll('.card');
    
            cards.forEach(function(card) {
                var cardText = card.innerText.toUpperCase();
    
                if (cardText.includes(filter)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-U7I2H4Hq38DFSTruMD5IeFYI6I5SiS9O3M5MT5zPjFEL1W5lEwRg10JLx2wnjOrM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIMB/RG2gCW" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>