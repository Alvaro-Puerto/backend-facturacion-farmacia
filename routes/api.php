<?php

use App\Http\Controllers\Api\V1\BackupController;
use App\Http\Controllers\Api\V1\ImprimirFacturaController;
use App\Http\Controllers\Api\V1\IndicadorVendedorController;
use App\Http\Controllers\Api\V1\ProductoController;
use App\Http\Controllers\Api\V1\VentaController;
use App\Http\Controllers\Auth\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login',  [ApiAuthController::class, 'login'])->name('login.api');
//Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
//Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    error_log("comprbando");
    $user = $request->user();
    error_log($user);
    $permissions = $user->getAllPermissions();
    return response()->json([
        'user' => $user,
        'permissions' => $permissions,
        'all' => Permission::all()
    ]);
});




Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('consecutivos', 'App\Http\Controllers\Api\V1\ConsecutivoController');
    Route::post('bodegas/entrada/inventario', 'App\Http\Controllers\Api\V1\EntradaInventarioController');
    Route::post('roles/permissions', 'App\Http\Controllers\Api\V1\RolPermisoController');
    Route::get('indicador/ventas', 'App\Http\Controllers\Api\V1\IndicadorVentaController');
    Route::get('indicador/vendedor', IndicadorVendedorController::class);
    //Route::get('factura', ImprimirFacturaController::class);
    Route::get('ventas/{id}/imprimir', ImprimirFacturaController::class);
    Route::get('bodegas/inventario/{id_bodega}/{id_articulo}', 'App\Http\Controllers\Api\V1\BodegaController@inventario');
    Route::apiResource('permisos', 'App\Http\Controllers\Api\V1\PermisoController');
    Route::apiResource('producto', ProductoController::class);
    Route::apiResource('um', 'App\Http\Controllers\Api\V1\UMController');
    Route::apiResource('bodegas', 'App\Http\Controllers\Api\V1\BodegaController');
    Route::apiResource('roles', 'App\Http\Controllers\Api\V1\RolController');
    Route::apiResource('users', 'App\Http\Controllers\Api\V1\UsuarioController');
    Route::apiResource('clientes', 'App\Http\Controllers\Api\V1\ClienteController');
    Route::apiResource('roles.users', 'App\Http\Controllers\Api\V1\UsuarioRolController');
    Route::apiResource('ventas',  VentaController::class);
    Route::get('backups/all', [ BackupController::class, 'list']);
    Route::get('backups',[ BackupController::class, 'backup']);

});


//Route::apiResource('consecutivos.modulos', 'App\Http\Controllers\Api\V1\ConsecutivoModuloController');
