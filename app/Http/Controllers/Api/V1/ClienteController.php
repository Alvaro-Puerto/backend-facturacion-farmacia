<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ClienteRequest;
use App\Models\Cliente;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ClienteRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['estado'] = true;
        $request['usuario_id'] = 1; // [TODO: Cambiar por el usuario autenticado
        $cliente = Cliente::create($request->all());
        return response()->json($cliente);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);

        $ventas = VentaCabecera::query()
            ->join('clientes', 'clientes.id', '=', 'venta_cabeceras.cliente_id')
            ->join('users', 'users.id', '=', 'venta_cabeceras.usuario_id')
            ->select('venta_cabeceras.*', 'clientes.nombres as cliente', 'clientes.direccion as direccion_cliente', 'clientes.email as c_email, clientes.telefono as c_telefono', 'users.name as usuario')
            ->where('venta_cabeceras.cliente_id', $id)
            ->get();

        $total_ventas = VentaCabecera::query()
            ->where('cliente_id', $id)
            ->sum('total');

        
        $data = [
            'cliente' => $cliente,
            'ventas' => $ventas,
            'total_ventas' => $total_ventas
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
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response()->json(null, 204);
    }
}
