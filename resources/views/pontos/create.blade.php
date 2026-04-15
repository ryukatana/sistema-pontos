@extends('layouts.app')

@section('content')

<h1>Adicionar Pontos</h1>

<form method="POST" action="/pontos">
    @csrf

    <label>Cliente:</label>
    <select name="cliente_id">
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}">
                {{ $cliente->nome }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Pontos:</label>
    <input type="number" name="pontos">

    <br><br>

    <button type="submit">Salvar</button>
</form>

@endsection
