<h1>Cadastrar Cliente</h1>

<form method="POST" action="/clientes">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <button type="submit">Salvar</button>
</form>
