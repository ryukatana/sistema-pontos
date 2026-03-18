<h1>Editar Cliente</h1>

<form method="POST" action="/clientes/{{ $cliente->id }}">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $cliente->nome }}">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $cliente->email }}">

    <br><br>

    <button type="submit">Atualizar</button>

</form>
