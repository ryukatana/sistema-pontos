<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Ponto;
use App\Models\Configuracao;


class PedidoController extends Controller
{
    public function extratoPorVendedorIndex()
{
    $vendedores = User::where('role', 'vendedor')->latest()->get();

    return view('extrato.vendedores', compact('vendedores'));
}

public function extratoPorVendedorShow($id)
{
    $vendedor = User::where('role', 'vendedor')->findOrFail($id);

    $pontos = Ponto::where('user_id', $vendedor->id)
        ->latest()
        ->get();

    $saldo = Ponto::where('user_id', $vendedor->id)->sum('pontos');

    return view('extrato.vendedor', compact('vendedor', 'pontos', 'saldo'));
}

    public function create()
{
    $clientes = Cliente::all();
    $vendedores = User::all();

    return view('pedidos.create', compact('clientes', 'vendedores'));
}

public function createAjuste()
{
    $vendedores = User::where('role', 'vendedor')->get();

    return view('ajustes.create', compact('vendedores'));
}

public function storeAjuste(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'tipo' => 'required|in:credito,debito',
        'pontos' => 'required|integer|min:1',
    ]);

    $pontos = (int) $request->pontos;

    if ($request->tipo === 'debito') {
        $pontos = -$pontos;
    }

    Ponto::create([
        'user_id' => $request->user_id,
        'pontos' => $pontos,
        'tipo' => $request->tipo,
        'descricao' => 'Ajuste manual',
    ]);

    return redirect('/saldo')->with('sucesso', 'Ajuste manual realizado com sucesso!');
}

    public function store(Request $request)
{
    // 1️⃣ pega valor
    $valor = $request->valor;

    // 2️⃣ calcula pontos
    $configuracao = Configuracao::first();
    $pontosPorReal = $configuracao->pontos_por_real;

    $pontos = $valor * $pontosPorReal;

    // 3️⃣ cria pedido
    $pedido = Pedido::create([
        'cliente_id' => $request->cliente_id,
        'user_id' => $request->user_id,
        'valor' => $valor,
        'pontos_gerados' => $pontos
    ]);

    // 4️⃣ cria pontos
    Ponto::create([
        'user_id' => $request->user_id,
        'pontos' => $pontos,
        'tipo' => 'credito',
        'descricao' => 'Pedido #' . $pedido->id
    ]);

    return redirect('/pedidos');
    return redirect('/clientes');
}

    public function index()
{
    $pedidos = Pedido::with(['cliente', 'user'])->get();

    return view('pedidos.index', compact('pedidos'));
}

public function saldo()
{
    $usuarios = User::where('role', 'vendedor')->get();

    foreach ($usuarios as $user) {
        $user->saldo = Ponto::where('user_id', $user->id)->sum('pontos');
    }

    return view('pedidos.saldo', compact('usuarios'));
}

public function extrato()
{
    $pontos = Ponto::with('user')->get();

    return view('pedidos.extrato', compact('pontos'));
}

}
