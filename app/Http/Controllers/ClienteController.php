<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::with('pontos')->get();
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

public function vendedoresIndex()
{
    $vendedores = User::where('role', 'vendedor')->latest()->get();

    return view('vendedores.index', compact('vendedores'));
}

public function vendedoresCreate()
{
    return view('vendedores.create');
}

public function vendedoresStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'vendedor',
    ]);

    return redirect('/vendedores')->with('sucesso', 'Vendedor cadastrado com sucesso!');
}

}
