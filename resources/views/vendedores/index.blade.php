@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Vendedores</h1>
        <a href="/vendedores/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Vendedor
        </a>
    </div>

    @if(session('sucesso'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Nome</th>
                    <th class="text-left px-4 py-3 border-b">Email</th>
                    <th class="text-left px-4 py-3 border-b">Perfil</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendedores as $vendedor)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $vendedor->name }}</td>
                        <td class="px-4 py-3 border-b">{{ $vendedor->email }}</td>
                        <td class="px-4 py-3 border-b">{{ $vendedor->role }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                            Nenhum vendedor cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
