<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\VentaCabecera;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndicadorVentaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $fecha_inicio = $request->query('fecha_inicio');
        $fecha_fin = $request->query('fecha_fin');

        $fecha_inicio = Carbon::parse($fecha_inicio)->format('Y-m-d');
        $fecha_fin = Carbon::parse($fecha_fin)->format('Y-m-d');

        $fechas = VentaCabecera::whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->select('fecha')
            ->groupBy('fecha')
            ->orderBy('fecha','asc')
            ->get();

        $total = VentaCabecera::whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->selectRaw('sum(total) as total')
            ->groupBy('fecha')
            ->orderBy('fecha','asc')
            ->get();
        
        $data =  [
                'xAxis' => [
                    'type' => 'category',
                    'data' => $fechas->pluck('fecha')
                ],
                'yAxis' => [
                    'type' => 'value'
                ],
                'series' => [
                    [
                        'data' => $total->pluck('total'),
                        'type' => 'line'
                    ]
                ]
            ];
        
        return response()->json($data); 
           
    }           
                    
}
