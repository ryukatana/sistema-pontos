<?php

namespace App\Http\Controllers;

use App\Models\Resgate;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Ponto;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index()
{
    $produtos = Produto::where('ativo', true)->get();
    $user = Auth::user();
    $saldo = \App\Models\Ponto::where('user_id', $user->id)->sum('pontos');

    return view('produtos.index', compact('produtos', 'saldo'));



}

public function listaResgates()
{
    $resgates = Resgate::with(['user', 'produto'])
        ->latest()
        ->get();

    return view('resgates.index', compact('resgates'));
}

public function entregarResgate($id)
{
    $resgate = Resgate::findOrFail($id);

    if ($resgate->status !== 'aprovado') {
        return redirect('/resgates')->with('erro', 'Só é possível entregar resgates aprovados.');
    }

    $resgate->status = 'entregue';
    $resgate->save();

    return redirect('/resgates')->with('sucesso', 'Resgate marcado como entregue!');
}

public function aprovarResgate($id)
{
    $resgate = Resgate::findOrFail($id);

    $resgate->status = 'aprovado';
    $resgate->save();

    return redirect('/resgates')->with('sucesso', 'Resgate aprovado com sucesso!');
}

public function cancelarResgate($id)
{
    $resgate = Resgate::findOrFail($id);

    if ($resgate->status === 'cancelado') {
        return redirect('/resgates')->with('erro', 'Esse resgate já foi cancelado.');
    }

    $resgate->status = 'cancelado';
    $resgate->save();

    Ponto::create([
        'user_id' => $resgate->user_id,
        'pontos' => $resgate->pontos,
        'tipo' => 'credito',
        'descricao' => 'Estorno do resgate #' . $resgate->id,
    ]);

    return redirect('/resgates')->with('sucesso', 'Resgate cancelado e pontos devolvidos!');
}

    public function create()
{
    return view('produtos.create');
}

    public function store(Request $request)
{
    Produto::create([
        'nome' => $request->nome,
        'descricao' => $request->descricao,
        'pontos_necessarios' => $request->pontos_necessarios,
        'ativo' => $request->has('ativo'),
    ]);

    return redirect('/produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
}

    public function resgatar($id)
{
    $produto = Produto::findOrFail($id);
    $user = Auth::user();

    $saldo = Ponto::where('user_id', $user->id)->sum('pontos');

    // 🔒 valida saldo
    if ($saldo < $produto->pontos_necessarios) {
        return redirect('/produtos')->with('erro', 'Pontos insuficientes');
    }

    // 🔥 cria solicitação de resgate
    $resgate = Resgate::create([
        'user_id' => $user->id,
        'produto_id' => $produto->id,
        'pontos' => $produto->pontos_necessarios,
        'status' => 'solicitado',
    ]);

    // 🔥 debita pontos
    Ponto::create([
        'user_id' => $user->id,
        'pontos' => -$produto->pontos_necessarios,
        'tipo' => 'debito',
        'descricao' => 'Resgate solicitado #' . $resgate->id
    ]);

    return redirect('/produtos')->with('sucesso', 'Resgate solicitado com sucesso!');
}

    public function meusResgates()
{
    $user = Auth::user();
    $resgates = Resgate::with('produto')
        ->where('user_id', $user->id)
        ->latest()
        ->get();

    return view('resgates.meus', compact('resgates'));
}

}
