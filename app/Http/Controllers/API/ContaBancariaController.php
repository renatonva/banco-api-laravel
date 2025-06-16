<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContaBancaria;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContaBancariaController extends Controller
{
    public function index()
    {
        return ContaBancaria::all();
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'titular' => 'required|string|max:255',
            'data_nascimento' => 'required|string|max:255',
            'logradouro' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'saldo' => 'numeric|min:0'
        ]);

        try{
            $conta = ContaBancaria::create($data);

            return response()->json([
                'message' => 'Conta Bancaria criada com sucesso.',
                'data' => $conta,
            ], Response::HTTP_CREATED);
        } catch(QueryException $e){
            if($e->getCode() === '23505' || $e->getCode() === '23000'){
                return response()->json([
                    'message' => 'Ja existe uma conta vinculada a este CPF',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } 
    }

    public function show(ContaBancaria $conta)
    {
        return $conta;
    }
}
