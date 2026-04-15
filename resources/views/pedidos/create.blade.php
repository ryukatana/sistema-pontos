@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Criar Pedido</h1>

    <form method="POST" action="/pedidos" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Cliente</label>
            <select name="cliente_id" class="w-full border rounded px-3 py-2">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Vendedor</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach ($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Valor (R$)</label>
            <input type="number" name="valor" step="0.01" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar Pedido
        </button>
    </form>
@endsection
