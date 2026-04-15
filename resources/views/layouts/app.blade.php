<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pontos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen flex">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-lg border-r border-gray-200 flex flex-col">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-xl font-bold text-blue-600">Sistema de Pontos</h1>
                <p class="text-sm text-gray-500 mt-1">
                    {{ auth()->user()->name }} ({{ auth()->user()->role }})
                </p>
            </div>

            <nav class="p-4 space-y-2 flex-1">

                <!-- DASHBOARD -->
                <a href="/dashboard"
                   class="block px-4 py-2 rounded-lg font-medium
                   {{ request()->is('dashboard') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                    Dashboard
                </a>

                <!-- PRODUTOS -->
                <a href="/produtos"
                   class="block px-4 py-2 rounded-lg font-medium
                   {{ request()->is('produtos') || request()->is('produtos/*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                    Produtos
                </a>

                @if(auth()->user()->isAdmin())

                    <!-- CLIENTES -->
                    <a href="/clientes"
                       class="block px-4 py-2 rounded-lg font-medium
                       {{ request()->is('clientes') || request()->is('clientes/*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Clientes
                    </a>

                    <!-- VENDEDORES -->
                    <a href="/vendedores"
                        class="block px-4 py-2 rounded-lg font-medium
                        {{ request()->is('vendedores') || request()->is('vendedores/*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Vendedores
                    </a>

                    <!-- PEDIDOS -->
                    <a href="/pedidos"
                       class="block px-4 py-2 rounded-lg font-medium
                       {{ request()->is('pedidos') || request()->is('pedidos/*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Pedidos
                    </a>

                    <!-- CONFIGURAÇÃO -->
                    <a href="/configuracoes"
                       class="block px-4 py-2 rounded-lg font-medium
                       {{ request()->is('configuracoes') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Configuração
                    </a>

                    <!-- RESGATES -->
                    <a href="/resgates"
                       class="block px-4 py-2 rounded-lg font-medium
                       {{ request()->is('resgates') || request()->is('resgates/*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Resgates
                    </a>

                    <!-- AJUSTE DE PONTOS -->
                    <a href="/ajustes/create"
                       class="block px-4 py-2 rounded-lg font-medium
                       {{ request()->is('ajustes/create') || request()->is('ajustes') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Ajuste de Pontos
                    </a>

                    <a href="/extrato/vendedor"
                        class="block px-4 py-2 rounded-lg font-medium
                        {{ request()->is('extrato/vendedor') || request()->is('extrato/vendedor/*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Extrato por Vendedor
                    </a>

                @endif

                <!-- EXTRATO -->
                <a href="/extrato"
                   class="block px-4 py-2 rounded-lg font-medium
                   {{ request()->is('extrato') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                    Extrato
                </a>

                <!-- SALDO -->
                <a href="/saldo"
                   class="block px-4 py-2 rounded-lg font-medium
                   {{ request()->is('saldo') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                    Saldo
                </a>

                @if(!auth()->user()->isAdmin())
                    <!-- MEUS RESGATES -->
                    <a href="/meus-resgates"
                       class="block px-4 py-2 rounded-lg font-medium
                       {{ request()->is('meus-resgates') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        Meus Resgates
                    </a>
                @endif
            </nav>

            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- CONTEÚDO -->
        <main class="flex-1 p-6">
            <div class="bg-white rounded-lg shadow p-6 min-h-[calc(100vh-3rem)]">
                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>
