<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // ========================
    // CLIENTES
    // ========================
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::get('/clientes/create', [ClienteController::class, 'create']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit']);
    Route::post('/clientes/{id}', [ClienteController::class, 'update']);
    Route::get('/clientes/{id}/delete', [ClienteController::class, 'destroy']);

    // ========================
    // PEDIDOS
    // ========================
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::get('/pedidos/create', [PedidoController::class, 'create']);
    Route::post('/pedidos', [PedidoController::class, 'store']);

    // ========================
    // PONTOS
    // ========================
    Route::get('/saldo', [PedidoController::class, 'saldo']);
    Route::get('/extrato', [PedidoController::class, 'extrato']);

    // ========================
    // PRODUTOS (LOJA)
    // ========================
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/produtos/resgatar/{id}', [ProdutoController::class, 'resgatar']);

    Route::get('/dashboard', function () {
    return redirect('/produtos');
})->middleware(['auth'])->name('dashboard');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

    Route::get('/produtos/create', [ProdutoController::class, 'create']);
    Route::post('/produtos', [ProdutoController::class, 'store']);

    Route::get('/configuracoes', [ConfiguracaoController::class, 'edit']);
    Route::post('/configuracoes', [ConfiguracaoController::class, 'update']);
    Route::get('/meus-resgates', [ProdutoController::class, 'meusResgates']);
    Route::get('/resgates', [ProdutoController::class, 'listaResgates']);
    Route::post('/resgates/{id}/aprovar', [ProdutoController::class, 'aprovarResgate']);
    Route::post('/resgates/{id}/cancelar', [ProdutoController::class, 'cancelarResgate']);
    Route::post('/resgates/{id}/entregar', [ProdutoController::class, 'entregarResgate']);
    Route::get('/ajustes/create', [PedidoController::class, 'createAjuste']);
    Route::post('/ajustes', [PedidoController::class, 'storeAjuste']);

    Route::get('/vendedores', [ClienteController::class, 'vendedoresIndex']);
    Route::get('/vendedores/create', [ClienteController::class, 'vendedoresCreate']);
    Route::post('/vendedores', [ClienteController::class, 'vendedoresStore']);
    Route::get('/extrato/vendedor', [PedidoController::class, 'extratoPorVendedorIndex']);
    Route::get('/extrato/vendedor/{id}', [PedidoController::class, 'extratoPorVendedorShow']);
});

// AUTH (Breeze)
require __DIR__.'/auth.php';
