<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DetallesPedido;
use App\Models\Pedidos;
use App\Models\Proveedores;
use App\Models\User;
use App\Models\Productos;
use DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = \DB::table('pedidos')
        ->join('proveedores', 'pedidos.idproveedor', '=', 'proveedores.idproveedor')
        ->join('users', 'pedidos.idadministrador', '=', 'users.id')
        ->join('detalles_pedidos', 'pedidos.idpedido', '=', 'detalles_pedidos.idpedido')
        ->join('productos', 'detalles_pedidos.idproducto', '=', 'productos.idproducto')
        ->select(
            'pedidos.*',
            'proveedores.*',
            'users.*',
            'detalles_pedidos.*',
            'productos.*'
        )
        ->get();

return view('administrador.pedidos', compact('pedidos'));

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        $pro = Proveedores::all();
        $prod = Productos::all();

        return view('administrador/pedidos/create',['prod'=>$prod , 'pro'=>$pro]);
        //return view('pedidos.create', compact('proveedores', 'administradores', 'productos')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear un nuevo pedido
        $pedidos = new Pedidos();
        $pedidos->fechahora = now();
        $pedidos->plazoentrega = $request->input('plazoentrega');
        $pedidos->idadministrador = auth()->user()->id;
        $pedidos->idproveedor = $request->input('idproveedor');
        $pedidos->save();
    
        // Guardar detalles de pedidos en la base de datos
        $detallepedido = new DetallesPedido();
        $detallepedido->idpedido = $pedidos->idpedido;
        // Asignar idproducto (asegúrate de reemplazar 'idproducto' con el nombre correcto del campo)
        $detallepedido->idproducto = $request->input('idproducto'); 
        $detallepedido->cantidadsolicitada = $request->input('cantidadsolicitada');
        $detallepedido->save();
    
        return redirect()->back()->with("success", "Tu pedido está en camino!");
    }
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pedido = Pedidos::with(['proveedor', 'administrador', 'detallesPedido.producto'])->find($id);
        $proveedores = Proveedor::all();
        $administradores = User::all();
        $productos = Productos::all();
        return view('pedidos.edit', compact('pedido', 'proveedores', 'administradores', 'productos'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
