@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Editar Cliente</h1>

    <form method="POST" action="/clientes/{{ $cliente->id }}" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Nome</label>
            <input type="text" name="nome" value="{{ $cliente->nome }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Atualizar
        </button>
    </form>
@endsection
