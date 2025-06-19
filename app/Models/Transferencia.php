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
        'tipo_transferencia_id',
        'banco_id',
        'valor',
        'descricao',
        'status',
        'realizada_em',
    ];

    public function contaOrigem()
    {
        return $this->belongsTo(ContaBancaria::class, 'conta_origem_id');
    }

    public function contaDestino()
    {
        return $this->belongsTo(ContaBancaria::class, 'conta_destino_id');
    }


}
