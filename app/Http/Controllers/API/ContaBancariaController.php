<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContaBancaria;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller
{
    public function index()
    {
        return ContaBancaria::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cpf' => 'required|string|max:255',
            'titular' => 'required|string|max:255',
            'saldo' => 'numeric|min:0'
        ]);

        return ContaBancaria::create($data);
    }

    public function show(ContaBancaria $conta)
    {
        return $conta;
    }
}
