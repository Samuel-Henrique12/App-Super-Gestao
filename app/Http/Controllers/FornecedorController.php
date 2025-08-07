<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function fornecedores() {

        $fornecedores = [
           0 => ['nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '11',
                'telefone' => '1234-5678'],
            1 =>['nome' => 'Fornecedor 2',
                 'status' => 'S',
                  'cnpj' => null,
                  'ddd' => '85',
                  'telefone' => '3330-3330'],
            2 =>['nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '0033-0000'],];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
