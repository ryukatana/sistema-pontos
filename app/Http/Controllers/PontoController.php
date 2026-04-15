<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Ponto;



class PontoController extends Controller
{
    public function create()
{
    $clientes = Cliente::all();
    return view('pontos.create', compact('clientes'));
}

public function store(Request $request)
{
    Ponto::create([
        'cliente_id' => $request->cliente_id,
        'pontos' => $request->pontos
    ]);

    return redirect('/clientes');
}
}
