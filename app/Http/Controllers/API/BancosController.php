<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banco;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BancosController extends Controller
{
    public function index()
    {
        return Banco::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo_banco' => 'required|string|max:8',
            'descricao' => 'required|string|max:255',
            'cnpj' => 'required|string|max:50',
            'status' => 'nullable|in:ATIVO,INATIVO,EXCLUIDO'
        ]);

        try {
            $banco = Banco::create($data);

            return response()->json([
                'mensagem' => 'Banco cadastrado com sucesso!',
                'data' => $banco
            ], Response::HTTP_CREATED);
        } catch(QueryException $e) {
            return response()->json([
                'mensagem' => 'Erro ao cadastrar banco!',
                'erro' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
