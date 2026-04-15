@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Extrato de Pontos</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Vendedor</th>
                    <th class="text-left px-4 py-3 border-b">Pontos</th>
                    <th class="text-left px-4 py-3 border-b">Tipo</th>
                    <th class="text-left px-4 py-3 border-b">Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pontos as $ponto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $ponto->user->name ?? 'Sem vendedor' }}</td>
                        <td class="px-4 py-3 border-b">
                            @if ($ponto->tipo == 'credito')
                                <span class="text-green-600 font-semibold">+{{ $ponto->pontos }}</span>
                            @else
                                <span class="text-red-600 font-semibold">{{ $ponto->pontos }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b">{{ $ponto->tipo }}</td>
                        <td class="px-4 py-3 border-b">{{ $ponto->descricao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
