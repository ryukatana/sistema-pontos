@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Extrato por Vendedor</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Nome</th>
                    <th class="text-left px-4 py-3 border-b">Email</th>
                    <th class="text-left px-4 py-3 border-b">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendedores as $vendedor)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $vendedor->name }}</td>
                        <td class="px-4 py-3 border-b">{{ $vendedor->email }}</td>
                        <td class="px-4 py-3 border-b">
                            <a href="/extrato/vendedor/{{ $vendedor->id }}"
                               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Ver Extrato
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                            Nenhum vendedor encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
