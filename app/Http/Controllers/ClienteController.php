<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return view ('clientes.index', compact ('clientes'));

    }

    public function create()
{
    return view('clientes.create');
}

public function store(Request $request)
{
    $cliente = new Cliente();

    $cliente->nome = $request->nome;
    $cliente->email = $request->email;

    $cliente->save();

    return redirect('/clientes');
}

public function edit($id)
{
    $cliente = Cliente::find($id);

    return view('clientes.edit', compact('cliente'));
}

public function update(Request $request, $id)
{
    $cliente = Cliente::find($id);

    $cliente->nome = $request->nome;
    $cliente->email = $request->email;

    $cliente->save();

    return redirect('/clientes');
}

public function destroy($id)
{
    $cliente = Cliente::find($id);

    $cliente->delete();

    return redirect('/clientes');
}

}
