@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Cadastrar Cliente</h1>

    <form method="POST" action="/clientes" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Nome</label>
            <input type="text" name="nome" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar
        </button>
    </form>
@endsection
