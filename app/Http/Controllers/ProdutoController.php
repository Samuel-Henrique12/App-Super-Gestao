<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        // Busca todos os produtos com suas respectivas unidades (Eager Loading)
        // e aplica paginação
        $produtos = Produto::with('unidade')->paginate(5);

        return view('app.produto', [
            'titulo' => 'Produtos',
            'produtos' => $produtos
        ]);
    }
    public function adicionar() {
        $unidades = Unidade::all();
        return view('app.adicionarProdutos', [
            'titulo' => 'Adicionar Produto',
            'unidades' => $unidades
        ]);
    }

    public function guardar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id' // Valida se a unidade selecionada existe na tabela 'unidades'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'peso.integer' => 'O campo peso deve ser um número inteiro.',
            'unidade_id.exists' => 'A unidade de medida informada não existe.'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('app.produto')->with('sucesso', 'Produto cadastrado com sucesso!');
    }
    public function editar($id)
    {
        $produto = Produto::find($id);
        $unidades = Unidade::all(); // Precisamos das unidades para o select

        return view('app.editarFornecedor', [
            'titulo' => 'Editar Produto',
            'produto' => $produto,
            'unidades' => $unidades
        ]);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());

        return redirect()->route('app.produto')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function excluir($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('app.produto')->with('sucesso', 'Produto excluído com sucesso!');
    }
}
