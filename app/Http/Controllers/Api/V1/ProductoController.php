<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Producto::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guardando por formdata

        // Guardar la imagen si existe
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageName = basename($imagePath);
        } else {
            $imageName = null;
        }

        // Crear el producto
        $producto = Producto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'um_id' => $request->input('um_id'),
            'precio_venta' => $request->input('precio_venta'),
            'iva' => $request->input('iva'),
            'ref1' => $request->input('ref1'),
            'ref2' => $request->input('ref2'),
            'ref3' => $request->input('ref3'),
            'ref4' => $request->input('ref4'),
            'image' => $imageName,
            'estado' => 1,
            'usuario_id' => auth()->user()->id
        ]);

        /*
        //$path = $request->file('image')->store('public');
        //$path_copy = $path;
        $request['image'] = 'sadad';
        $request['estado'] = 1;
        $request['usuario_id'] = 1; // [TODO: Cambiar por el usuario autenticado
        //$request['nombre'] = 'Producto de limpieza';
        //$request['descripcion'] = 'Producto de limpieza';
        //$request['precio_venta'] = 100;
        //$request['precio_compra'] = 50;
        $request['iva'] = 15;
    //$request['um_id'] =1;
        $producto = Producto::create($request->all());

        $producto->image = 'dsad';
        $producto->save();

        return response()->json($producto);*/

        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);


        $inventario = FacadesDB::table('bodeg_existencias')
            ->join('bodegas', 'bodeg_existencias.bodega_id', '=', 'bodegas.id')
            ->where('bodeg_existencias.producto_id', '=', $id)
            ->get();


        $transacciones = FacadesDB::table('transaccion_detalles')
            ->join('productos', 'transaccion_detalles.producto_id', '=', 'productos.id')
            ->join('transaccion_cabeceras', 'transaccion_detalles.transaccion_cabecera_id', '=', 'transaccion_cabeceras.id')
            ->join('bodegas', 'transaccion_cabeceras.bodega_id', '=', 'bodegas.id')
            ->where('transaccion_detalles.producto_id', '=', $id)
            ->select(['bodegas.nombre as bodega', 'transaccion_cabeceras.numero as numero', 'transaccion_cabeceras.fecha as fecha', 'transaccion_detalles.cantidad as cantidad', 'transaccion_detalles.precio_entrada as precio', 'transaccion_detalles.subtotal_entrada', 'transaccion_cabeceras.tipo', 'transaccion_detalles.id'])
            ->get();

        $data = [
            'producto' => $producto,
            'inventario' => $inventario,
            'transacciones' => $transacciones
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);

        $producto->update($request->all());
        $producto->save();
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->estado = false;
        $producto->save();

        return response()->json($producto);
    }
}
