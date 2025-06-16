<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['nome', 'sobrenome','titular', 'cpf', 'data_nascimento', 'logradouro',
                          'telefone', 'email', 'saldo'];
}
