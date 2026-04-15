<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ponto;
use App\Models\Pedido;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // saldo atual
    $saldo = Ponto::where('user_id', $user->id)->sum('pontos');

    // total de vendas (R$)
    $totalVendas = Pedido::where('user_id', $user->id)->sum('valor');

    // pontos ganhos (só créditos)
    $pontosGanhos = Ponto::where('user_id', $user->id)
        ->where('tipo', 'credito')
        ->sum('pontos');

    // últimos pedidos
    $ultimosPedidos = Pedido::where('user_id', $user->id)
        ->latest()
        ->take(5)
        ->get();

    // últimos resgates
    $ultimosResgates = Ponto::where('user_id', $user->id)
        ->where('tipo', 'debito')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'saldo',
        'totalVendas',
        'pontosGanhos',
        'ultimosPedidos',
        'ultimosResgates'
    ));
}
}
