<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'conta_origem_id',
        'conta_destino_id',
        'valor',
        'descricao',
        'status',
        'realizada_em',
    ];

}
