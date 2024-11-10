<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BodegExistencia;
use App\Models\VentaCabecera;
use App\Models\VentaDetella;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Str;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fecha_inicio = $request->query('fecha_inicio');
        $fecha_fin = $request->query('fecha_fin');

        $fecha_inicio = Carbon::parse($fecha_inicio)->format('Y-m-d');
        $fecha_fin = Carbon::parse($fecha_fin)->format('Y-m-d');

        $ventas = DB::table('venta_cabeceras')
            ->join('clientes', 'venta_cabeceras.cliente_id', '=', 'clientes.id')
            ->join('users', 'venta_cabeceras.usuario_id', '=', 'users.id')
            ->select('venta_cabeceras.*', 'clientes.nombres  as nombres', 'clientes.apellidos as apellidos', 'users.name as usuario')
            ->whereBetween('venta_cabeceras.fecha', [$fecha_inicio, $fecha_fin])
            ->get();

        return response()->json($ventas);
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
        $venta = VentaCabecera::create([
            'cliente_id' => $request->cliente_id,
            'bodega_id' => $request->bodega_id,
            'usuario_id' => 1,
            'fecha' => Carbon::now()->format('Y-m-d'),
            'observacion' => $request->observacion,
            'total' => $request->total,
            'descuento' => $request->descuento,
            'subtotal' => $request->subtotal,
            'iva' => $request->iva,
            'estado' => 1,
            'ref1' => 'ref1',
            'ref2' => 'ref2',
            'ref3' => 'ref3',
            'ref4' => 'ref4',
        ]);

        foreach ($request->detalle as $key) {
            VentaDetella::create(
                [
                    'venta_cabecera_id' => $venta->id,
                    'producto_id' => $key['producto_id'],
                    'cantidad' => $key['cantidad'],
                    'precio' => $key['precio'],
                    'descuento' =>0,
                    'subtotal' => $key['subtotal'],
                    'iva' => $key['iva'],
                    'total' => $key['total'],
                    'observacion'=> '----',
                    'estado' => 1,
                    'ref1' => 'ref1',
                    'ref2' => 'ref2',
                    'ref3' => 'ref3',
                    'ref4' => 'ref4',
                ]
            );

            $bodegaExistencia = BodegExistencia::where('bodega_id', $request->bodega_id)
                ->where('producto_id', $key['producto_id'])
                ->first();
            $bodegaExistencia->update([
                'cantidad' => $bodegaExistencia->cantidad - $key['cantidad'],
            ]);
        }

        return response()->json($venta, 201);
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
