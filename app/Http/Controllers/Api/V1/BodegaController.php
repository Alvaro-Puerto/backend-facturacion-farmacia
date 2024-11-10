<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Bodega;
use App\Models\BodegExistencia;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bodegas = Bodega::all();
        return response()->json($bodegas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['usuario_id'] = 1; // [TODO: Cambiar por el usuario autenticado    
        $bodega = Bodega::create($request->all());
        return response()->json($bodega);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function inventario($id_bodega, $id_articulo) {
        $cantidad = BodegExistencia::where('bodega_id', $id_bodega)
            ->where('producto_id', $id_articulo)
            ->first();

        return response()->json($cantidad);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $bodega = Bodega::find($id);
        return response()->json($bodega);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bodega = Bodega::find($id);
        $request['usuario_id'] = 1; // [TODO: Cambiar por el usuario autenticado    
        $bodega->update($request->all());
        return response()->json($bodega);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bodega = Bodega::find($id);
        $bodega->delete();
        return response()->json('Bodega eliminada correctamente');
    }
}
