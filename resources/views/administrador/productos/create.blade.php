<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
    <link rel="stylesheet" href="/css/formCrear.css">
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
                    <a id="inbox" href="{{route('administrador.inventario')}}">
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
                <h1>Nuevo Producto</h1>
            </div>
        </div>
        <div class="color">
            <div class="container">
                <div class="titulof">
                    <h2>Datos de registro</h2>
                </div>
             
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
                    @csrf
            
                    <div class="mt-4">
                        <label for="idmarca">Marca</label>
                        <select name="idmarca" id="idmarca" class="block mt-1 w-full">
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->idmarca }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mt-4">
                        <label for="idtipo">Tipo</label>
                        <select name="idtipo" id="idtipo" class="block mt-1 w-full">
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->idtipo }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mt-4">
                        <label for="descripcion">Descripción del producto</label>
                        <input type="text" name="descripcion" id="descripcion" class="block mt-1 w-full">
                    </div>
            
                    <div class="mt-4">
                        <label for="cantidad">Cantidad del producto</label>
                        <input type="number" name="cantidad" id="cantidad" class="block mt-1 w-full">
                    </div>
            
                    <div class="mt-4">
                        <label for="contneto">Contenido Neto</label>
                        <input type="text" name="contneto" id="contneto" class="block mt-1 w-full">
                    </div>
            
                    <div class="mt-4">
                        <label for="unidadxempaque">Unidad x Empaque</label>
                        <input type="number" name="unidadxempaque" id="unidadxempaque" class="block mt-1 w-full">
                    </div>
            
                    <div class="mt-4">
                        <label for="disponibilidad">Disponibilidad</label>
                        <select name="disponibilidad" class="block mt-1 w-full">
                            <option value="Disponible">Disponible</option>
                            <option value="NoDisponible">No Disponible</option>
                        </select>
                    </div>
            
                    <div class="mt-4">
                        <label for="valor">Valor del producto</label>
                        <input type="text" name="valor" id="valor" class="block mt-1 w-full">
                    </div>
            
                    <div class="mt-4">
                        <label for="imagen">Imagen del producto</label>
                        <input type="file" name="imagen" id="imagen" class="block mt-1 w-full">
                    </div>
            
                    <div class="mt-4">
                        <label for="" style="color: white">.</label>
                        <div id="crear">
                            <button type="submit">Crear Producto</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
</body>
</html>