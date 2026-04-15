<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function edit()
    {
        $configuracao = Configuracao::first();

        return view('configuracoes.edit', compact('configuracao'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pontos_por_real' => 'required|integer|min:1',
        ]);

         $configuracao = Configuracao::first();

        $configuracao->update([
            'pontos_por_real' => $request->pontos_por_real,
        ]);

        return redirect('/dashboard')->with('sucesso', 'Configuração atualizada com sucesso!');
    }
}

