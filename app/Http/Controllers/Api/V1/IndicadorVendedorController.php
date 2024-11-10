<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndicadorVendedorController extends Controller
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

        $usuarios = DB::table('users')
            ->join('venta_cabeceras', 'users.id', '=', 'venta_cabeceras.usuario_id')
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->select('name')
            ->groupBy('name')
            ->orderBy('name','asc')
            ->get();

        $total =  DB::table('users')
            ->join('venta_cabeceras', 'users.id', '=', 'venta_cabeceras.usuario_id')
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->selectRaw('users.name as name, sum(total) as value')
            ->groupBy('name')
            ->orderBy('name','asc')
            ->get();
        
        $data = [
            'tooltip' => [
                'trigger' => 'item',
                'formatter' => '{a} <br/>{b}: {c} ({d}%)'
            ],
            'legend' => [
                'orient' => 'vertical',
                'left' => 10,
                'data' => $usuarios->pluck('name')
            ],
            'series' => [
                [
                    'name' => 'serieees',
                    'type' => 'pie',
                    'radius' => ['50%', '70%'],
                    'avoidLabelOverlap' => false,
                    'label' => [
                        'show' => false,
                        'position' => 'center'
                    ],
                    'emphasis' => [
                        'label' => [
                            'show' => true,
                            'fontSize' => '30',
                            'fontWeight' => 'bold'
                        ]
                    ],
                    'lqbelLine' => [
                        'show' => false
                    ],
                    'data' => $total,
                    
                ]
            ]
        ];
        return response()->json($data);        
    }
}
