<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedor', ['titulo' => 'Fornecedores', 'fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {
        return view('app.adicionarFornecedor', ['titulo' => 'Adicionar Fornecedor']);
    }
    public function guardar(Request $request) {

        // Regras de validação
        $regras = [
            'nome'  => 'required|min:3|max:40',
            'site'  => 'required',
            'uf'    => 'required|size:2',
            'email' => 'required|email'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'uf.size' => 'O campo UF deve ter exatamente 2 caracteres.',
            'email.email' => 'O campo e-mail deve ser um endereço válido.'
        ];

        $request->validate($regras, $feedback);
        $fornecedor = new Fornecedor();
        $fornecedor->create($request->all());
    }
}
