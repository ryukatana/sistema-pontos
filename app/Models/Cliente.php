<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf'
    ];

    public function pontos()
{
    return $this->hasMany(Ponto::class);
}
    public function pedidos()
{
    return $this->hasMany(Pedido::class);
}
}

