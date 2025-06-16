<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContaBancaria;
use App\Models\Transferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferenciaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'conta_origem_id' => 'required|uuid|exists:conta_bancarias,id',
            'conta_destino_id' => 'required|uuid|exists:conta_bancarias,id|different:conta_origem_id',
            'valor' => 'required|numeric|min:0.01',
        ]);
        
        return DB::transaction(function () use ($data){
            $origem = ContaBancaria::findOrFail($data['conta_origem_id']);
            $destino = ContaBancaria::findOrFail($data['conta_destino_id']);

            if($origem->saldo < $data['valor']){
                return response()->json(['error' => 'Saldo insuficiente'], 400);
            }

            $origem->decrement('saldo', $data['valor']);
            $destino->increment('saldo', $data['valor']);

            $transferencia = Transferencia::create([
                ...$data,
                'data' => now(),
            ]);

            return response()->json($transferencia, 201);
        });
    }

    public function index()
    {
        return Transferencia::with(['contaOrigem', 'contaDestino'])->get();
    }
}
