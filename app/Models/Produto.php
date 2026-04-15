<?php

namespace App\Models;

use App\Models\Ponto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
    'nome',
    'descricao',
    'pontos_necessarios',
    'ativo'
];

}
