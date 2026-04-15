@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Configuração de Pontos</h1>

    <form method="POST" action="/configuracoes" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Quantos pontos valem R$ 1</label>
            <input type="number" name="pontos_por_real" value="{{ $configuracao->pontos_por_real }}" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar Configuração
        </button>
    </form>
@endsection
