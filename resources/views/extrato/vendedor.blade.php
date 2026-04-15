@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Extrato do Vendedor</h1>
            <p class="text-gray-600">{{ $vendedor->name }} - {{ $vendedor->email }}</p>
        </div>

        <a href="/extrato/vendedor" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            Voltar
        </a>
    </div>

    <div class="mb-6">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h2 class="text-sm text-gray-600 mb-2">Saldo Atual</h2>
            <p class="text-2xl font-bold text-blue-600">{{ $saldo }} pontos</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Pontos</th>
                    <th class="text-left px-4 py-3 border-b">Tipo</th>
                    <th class="text-left px-4 py-3 border-b">Descrição</th>
                    <th class="text-left px-4 py-3 border-b">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pontos as $ponto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">
                            @if ($ponto->tipo === 'credito')
                                <span class="text-green-600 font-semibold">+{{ $ponto->pontos }}</span>
                            @else
                                <span class="text-red-600 font-semibold">{{ $ponto->pontos }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b">{{ $ponto->tipo }}</td>
                        <td class="px-4 py-3 border-b">{{ $ponto->descricao }}</td>
                        <td class="px-4 py-3 border-b">{{ $ponto->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Nenhuma movimentação encontrada para este vendedor.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
