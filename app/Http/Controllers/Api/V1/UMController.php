<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\UM;
use Illuminate\Http\Request;

class UMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $um = UM::all();
        return response()->json($um);
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
        $um = UM::create($request->all());
        return response()->json($um);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bodega = UM::find($id);

        $articulos = Producto::query()
            ->join('u_m_s', 'u_m_s.id', '=', 'productos.um_id')
            ->select('productos.*')
            ->where('productos.um_id', $id)
            ->get();

        $total_articulos = Producto::query()
            ->where('um_id', $id)
            ->count();
        
        $data = [
            'bodega' => $bodega,
            'articulos' => $articulos,
            'total_articulos' => $total_articulos
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
        $um = UM::find($id);
        $um->update($request->all());
        return response()->json($um);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $um = UM::find($id);
        $um->delete();
        return response()->json('Unidad de Medida eliminada correctamente');
    }
}
