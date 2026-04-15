@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Saldo de Pontos</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3 border-b">Vendedor</th>
                    <th class="text-left px-4 py-3 border-b">Pontos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $user->name }}</td>
                        <td class="px-4 py-3 border-b font-semibold text-blue-600">{{ $user->saldo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
