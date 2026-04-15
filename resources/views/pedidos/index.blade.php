@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Pedidos</h1>
        <a href="/pedidos/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Pedido
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Cliente</th>
                    <th class="text-left px-4 py-3 border-b">Vendedor</th>
                    <th class="text-left px-4 py-3 border-b">Valor</th>
                    <th class="text-left px-4 py-3 border-b">Pontos Gerados</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $pedido->cliente->nome }}</td>
                        <td class="px-4 py-3 border-b">{{ $pedido->user->name }}</td>
                        <td class="px-4 py-3 border-b">R$ {{ $pedido->valor }}</td>
                        <td class="px-4 py-3 border-b text-green-600 font-semibold">+{{ $pedido->pontos_gerados }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
