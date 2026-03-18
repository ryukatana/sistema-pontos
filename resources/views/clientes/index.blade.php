<h1>Lista de Clientes</h1>

<a href="/clientes/create">Novo Cliente</a>

<br><br>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Ações</th>
</tr>

@foreach ($clientes as $cliente)
<tr>
    <td>{{ $cliente->nome }}</td>
    <td>{{ $cliente->email }}</td>
    <td>
        <a href="/clientes/{{ $cliente->id }}/edit">Editar</a>

    <form method="POST" action="/clientes/{{ $cliente->id }}/delete" style="display:inline;">
        @csrf
        <button type="submit">Excluir</button>
    </form>
    </td>
</tr>
@endforeach

</table>
