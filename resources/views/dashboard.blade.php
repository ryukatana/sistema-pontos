@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h2 class="text-sm text-gray-600 mb-2">Saldo Atual</h2>
            <p class="text-2xl font-bold text-blue-600">{{ $saldo }} pts</p>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <h2 class="text-sm text-gray-600 mb-2">Total Vendido</h2>
            <p class="text-2xl font-bold text-green-600">R$ {{ $totalVendas }}</p>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <h2 class="text-sm text-gray-600 mb-2">Pontos Ganhos</h2>
            <p class="text-2xl font-bold text-yellow-600">{{ $pontosGanhos }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-semibold mb-3">Últimos Pedidos</h3>
            <div class="bg-gray-50 rounded-lg p-4">
                <ul class="space-y-2">
                    @foreach ($ultimosPedidos as $pedido)
                        <li class="border-b pb-2">
                            Pedido #{{ $pedido->id }} - R$ {{ $pedido->valor }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-3">Últimos Resgates</h3>
            <div class="bg-gray-50 rounded-lg p-4">
                <ul class="space-y-2">
                    @foreach ($ultimosResgates as $resgate)
                        <li class="border-b pb-2">
                            {{ $resgate->descricao }}  {{ $resgate->pontos }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
