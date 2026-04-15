@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Lista de Resgates</h1>

    @if(session('sucesso'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
            {{ session('sucesso') }}
        </div>
    @endif

    @if(session('erro'))
        <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
            {{ session('erro') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Vendedor</th>
                    <th class="text-left px-4 py-3 border-b">Produto</th>
                    <th class="text-left px-4 py-3 border-b">Pontos</th>
                    <th class="text-left px-4 py-3 border-b">Status</th>
                    <th class="text-left px-4 py-3 border-b">Data</th>
                    <th class="text-left px-4 py-3 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resgates as $resgate)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $resgate->user->name }}</td>
                        <td class="px-4 py-3 border-b">{{ $resgate->produto->nome }}</td>
                        <td class="px-4 py-3 border-b">{{ $resgate->pontos }}</td>
                        <td class="px-4 py-3 border-b">
                            @if($resgate->status === 'solicitado')
                                <span class="text-yellow-600 font-medium">solicitado</span>
                            @elseif($resgate->status === 'aprovado')
                                <span class="text-blue-600 font-medium">aprovado</span>
                            @elseif($resgate->status === 'entregue')
                                <span class="text-green-600 font-medium">entregue</span>
                            @elseif($resgate->status === 'cancelado')
                                <span class="text-red-600 font-medium">cancelado</span>
                            @else
                                <span>{{ $resgate->status }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b">{{ $resgate->created_at }}</td>
                        <td class="px-4 py-3 border-b">
                            @if($resgate->status === 'solicitado')
    <div class="flex gap-2">
        <form method="POST" action="/resgates/{{ $resgate->id }}/aprovar">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                Aprovar
            </button>
        </form>

        <form method="POST" action="/resgates/{{ $resgate->id }}/cancelar">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Cancelar
            </button>
        </form>
    </div>

@elseif($resgate->status === 'aprovado')
    <div class="flex gap-2">
        <form method="POST" action="/resgates/{{ $resgate->id }}/entregar">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                Marcar como Entregue
            </button>
        </form>
    </div>

@else
    <span class="text-gray-400">Sem ações</span>
@endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Nenhum resgate encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
