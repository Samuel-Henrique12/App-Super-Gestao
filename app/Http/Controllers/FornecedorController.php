<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->input('pesquisa');

        $query = Fornecedor::query();
        if ($pesquisa) {
            $query->where(function ($q) use ($pesquisa) {
                $q->where('nome', 'like', '%' . $pesquisa . '%')
                    ->orWhere('site', 'like', '%' . $pesquisa . '%')
                    ->orWhere('uf', 'like', '%' . $pesquisa . '%')
                    ->orWhere('email', 'like', '%' . $pesquisa . '%');
            });
        }
        $fornecedores = $query->paginate(5);

        //$fornecedores = Fornecedor::all();
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
        Fornecedor::create($request->all());
        return redirect()->route('app.fornecedor')->with('sucesso', 'Fornecedor cadastrado com sucesso!');

    }

    public function editar($id) {
        $fornecedor = Fornecedor::find($id);
        return view('app.editarFornecedor', ['titulo' => 'Editar fornecedor', 'fornecedor' => $fornecedor]);
    }

    public function update(Request $request, $id) {
        $fornecedor = Fornecedor::find($id);

        $request->validate([
            'nome'  => 'required|min:3|max:40',
            'site'  => 'required',
            'uf'    => 'required|size:2',
            'email' => 'required|email|unique:fornecedores,email,'.$fornecedor->id
        ]);

        $fornecedor->update($request->all());

        return redirect()->route('app.fornecedor')->with('sucesso', 'Fornecedor atualizado com sucesso!');
    }
    public function excluir($id) {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor')->with('sucesso', 'Fornecedor excluído com sucesso!');
    }
}
