@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Loja de Produtos</h1>

    <div class="mb-6">
        <p class="text-lg font-semibold text-blue-600">Seu saldo: {{ $saldo }} pontos</p>
    </div>


    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Loja de Produtos</h1>

    @if(auth()->user()->isAdmin())
        <a href="/produtos/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Produto
        </a>
    @endif

    </div>


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
                    <th class="text-left px-4 py-3 border-b">Produto</th>
                    <th class="text-left px-4 py-3 border-b">Descrição</th>
                    <th class="text-left px-4 py-3 border-b">Pontos</th>
                    <th class="text-left px-4 py-3 border-b">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $produto->nome }}</td>
                        <td class="px-4 py-3 border-b">{{ $produto->descricao }}</td>
                        <td class="px-4 py-3 border-b">{{ $produto->pontos_necessarios }}</td>
                        <td class="px-4 py-3 border-b">
                            @if($saldo >= $produto->pontos_necessarios)
                                <a href="/produtos/resgatar/{{ $produto->id }}"
                                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    Resgatar
                                </a>
                            @else
                                <span class="text-gray-400 font-medium">Pontos insuficientes</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
