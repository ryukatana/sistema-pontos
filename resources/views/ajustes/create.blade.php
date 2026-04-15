@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Ajuste Manual de Pontos</h1>

    <form method="POST" action="/ajustes" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Vendedor</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach ($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Tipo</label>
            <select name="tipo" class="w-full border rounded px-3 py-2">
                <option value="credito">Adicionar pontos</option>
                <option value="debito">Remover pontos</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Quantidade de pontos</label>
            <input type="number" name="pontos" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar Ajuste
        </button>
    </form>
@endsection
