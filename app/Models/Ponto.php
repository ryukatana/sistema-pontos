<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ponto extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'pontos',
    'tipo',
    'descricao'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }

public function user()
{
    return $this->belongsTo(User::class);
}

}
