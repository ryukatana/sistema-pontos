@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Clientes</h1>
        <a href="/clientes/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Cliente
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Nome</th>
                    <th class="text-left px-4 py-3 border-b">Email</th>
                    <th class="text-left px-4 py-3 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $cliente->nome }}</td>
                        <td class="px-4 py-3 border-b">{{ $cliente->email }}</td>
                        <td class="px-4 py-3 border-b">
                            <div class="flex gap-2 flex-wrap">
                                <a href="/clientes/{{ $cliente->id }}/edit"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Editar
                                </a>

                                <form method="POST" action="/clientes/{{ $cliente->id }}/delete">
                                    @csrf
                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
