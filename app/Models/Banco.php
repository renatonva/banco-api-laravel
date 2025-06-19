<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'codigo_banco',
        'descricao',
        'cnpj',
        'status'
    ];
}
