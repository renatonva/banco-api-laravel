<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TipoTransferencia extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'tipo_transferencias';
    protected $fillable = ['descricao', 'status'];
  
}
