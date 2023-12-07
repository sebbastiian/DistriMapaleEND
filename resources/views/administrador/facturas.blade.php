<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
    <link rel="stylesheet" href="/css/facturaa.css">
</head>
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
                    <a href="{{route('administrador.proveedores')}}">
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
                <h2>Inventario</h2>
                <div class="search-bar">
                    <input class="inputsrch" type="text" id="searchInput" placeholder="Buscar productos...">
                    <button class="search-botn " onclick="buscarProductos()">Buscar</button>
                </div>                               
            </div>
        </div>
        <div class="color">
            <div class="titabl tabla-productos">

                <h1 style="margin-bottom: 7%">Listado de Facturas</h1>
                
            </div>
            <div class="containerr">

                
                <div>
                    @foreach ($facturas as $factura)
                    <div class="card">
                        <div class="card-header">
                            Factura #{{ $factura->idfactura }}
                        </div>
                        <div class="card-body">
                            <p>Fecha y Hora: {{ $factura->fechahora }}</p>
                            <p>Total: ${{ $factura->total }}</p>
                            <p>Estado: {{ $factura->estado }}</p>
        
                            <h5>Detalles del Producto:</h5>
                            <div>
                                <h6>ID Detalle Factura: {{ $factura->iddetallefactura }}</h6>
                                <h6>Nombre del Producto: {{ $factura->name }}</h6>
                                <h6>Cantidad: {{ $factura->cantidad }}</h6>
                                <h6>Valor Unitario: ${{ $factura->valorunitario }}</h6>
                                <!-- Agrega más detalles del producto según sea necesario -->
                            </div>
        
                            <h5>Detalles del Cliente:</h5>
                            <div>
                                <h6>Nombre: {{ $factura->name }} {{ $factura->apellido }}</h6>
                                <h6>Correo Electrónico: {{ $factura->email }}</h6>
                                <h6>Dirección: {{ $factura->direccion }}</h6>
                                <!-- Agrega más detalles del cliente según sea necesario -->
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
</body>
</html>