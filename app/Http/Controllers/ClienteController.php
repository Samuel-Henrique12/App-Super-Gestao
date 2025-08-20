<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::paginate(10);
        return view ('app.cliente', ['titulo' => 'Clientes', 'clientes' => $clientes]);
    }

    public function adicionar() {
        return view('app.adicionarCliente', ['titulo' => 'Adicionar Cliente']);

    }

    public function guardar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40'
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.'
        ];

        $request->validate($regras, $feedback);

        // Salva no banco
        Cliente::create($request->all());

        return redirect()->route('app.cliente')->with('sucesso', 'Cliente cadastrado com sucesso!');
    }
    public function editar(Cliente $cliente)
    {
        return view('app.editarCliente', ['titulo' => 'Editar Cliente', 'cliente' => $cliente]);
    }
    public function atualizar(Request $request, Cliente $cliente)
    {
        $regras = [
            'nome' => 'required|min:3|max:40'
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.'
        ];

        $request->validate($regras, $feedback);

        $cliente->update($request->all());

        return redirect()->route('app.cliente')->with('sucesso', 'Cliente atualizado com sucesso!');
    }
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('app.cliente')->with('sucesso', 'Cliente excluído com sucesso!');
    }
}
