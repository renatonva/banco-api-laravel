<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TipoTransferencia;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TipoTransferenciaController extends Controller
{

    public function index()
    {
        return TipoTransferencia::all();
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'descricao' => 'required|string|max:255',
            'status' => 'required|in:ATIVO, INATIVO, EXCLUIDO',
        ]);

        try{
            $tipo = TipoTransferencia::create($data);

            return response()->json([
                'message' => 'Tipo de Transferencia criada com sucesso',
                'data' => $tipo
            ], Response::HTTP_CREATED);
        } catch(QueryException $e){
            return response()->json([
                'message' => 'Não foi possível criar um tipo de Transferencia',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
