<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\VentaCabecera;
use App\Models\VentaDetella;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;



class ImprimirFacturaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $id)
    {
       $ventaCabecera = VentaCabecera::query()
                        ->join('clientes', 'clientes.id', '=', 'venta_cabeceras.cliente_id')
                        ->join('users', 'users.id', '=', 'venta_cabeceras.usuario_id')
                        ->select('venta_cabeceras.*', 'clientes.nombres as cliente', 'clientes.direccion as direccion_cliente', 'clientes.email as c_email, clientes.telefono as c_telefono' ,'users.name as usuario')
                        ->where('venta_cabeceras.id', $id)
                        ->first();



        $lineasFacturas = VentaDetella::query()
                        ->join('productos', 'productos.id', '=', 'venta_detellas.producto_id')
                        ->select('venta_detellas.*', 'productos.nombre as producto')
                        ->where('venta_detellas.venta_cabecera_id', $id)
                        ->get();
        $data = [
            'cabecera' => $ventaCabecera,
            'lineas' => $lineasFacturas
        ];
        return response()->json($data);

    }
}
