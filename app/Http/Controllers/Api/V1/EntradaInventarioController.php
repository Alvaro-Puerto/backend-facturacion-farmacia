<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BodegExistencia;
use App\Models\TransaccionCabecera;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EntradaInventarioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $transaccionCabecera = TransaccionCabecera::create([
            'tipo' => 'ENTRADA INVENTARIO',
            'fecha' => Carbon::now(),
            'usuario_id' => 1,
            'bodega_id' => $request->bodega_id,
            'estado' => 'APROBADA',
            'observacion' => ' ',
            'numero' => '00000000',
        ]);

        $transaccionCabecera->numero = 'ENT-INV-' . $transaccionCabecera->id;
        $transaccionCabecera->save();

        foreach ($request->lines as $linea) {
            
            $transaccionCabecera->lines()->create([
                'producto_id' => $linea['producto_id'],
                'cantidad' => $linea['cantidad'],
                'precio_entrada' => $linea['precio'],
                'subtotal_entrada' => $linea['subtotal'],
                'iva_entrada' => $linea['iva'],
                'total_entrada' => $linea['total'],
                'usuario_id' => 1
            ]);

            $bodegaExistencia = BodegExistencia::where('bodega_id', $request->bodega_id)
                ->where('producto_id', $linea['producto_id'])
                ->first();

            if ($bodegaExistencia) {
                $bodegaExistencia->cantidad += $linea['cantidad'];
                $bodegaExistencia->save();
            } else {
                BodegExistencia::create([
                    'bodega_id' => $request->bodega_id,
                    'producto_id' => $linea['producto_id'],
                    'cantidad' => $linea['cantidad']
                ]);
            }
          
        }

       

        return response()->json($transaccionCabecera);
    }
}
