@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Cadastrar Produto</h1>

    <form method="POST" action="/produtos" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Nome do produto</label>
            <input type="text" name="nome" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Descrição</label>
            <textarea name="descricao" class="w-full border rounded px-3 py-2" rows="4"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Pontos necessários</label>
            <input type="number" name="pontos_necessarios" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="ativo" id="ativo" checked>
            <label for="ativo" class="font-medium">Produto ativo</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar Produto
        </button>
    </form>
@endsection
