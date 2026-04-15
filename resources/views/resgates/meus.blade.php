@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Meus Resgates</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Produto</th>
                    <th class="text-left px-4 py-3 border-b">Pontos</th>
                    <th class="text-left px-4 py-3 border-b">Status</th>
                    <th class="text-left px-4 py-3 border-b">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resgates as $resgate)
                    <tr class="hover:bg-gray-50">
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Você ainda não fez nenhum resgate.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
