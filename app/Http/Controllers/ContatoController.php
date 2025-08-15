<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'nome.max' => 'O campo nome deve ter menos que 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'email.required' => 'O campo email precisa ser preenchido',
            'email.email' => 'O campo de email precisa de um dominio de email',
            'motivo_contatos_id.required' => 'O campo de motivos precisa ser informado',
            'mensagem.required' => 'O campo mensagem precisa ser informado',
            'mensagem.max' => 'Maximo de caracteres excedido'
        ]
        );
            SiteContato::create($request->all());
            return redirect()->route('site.index');

    }
}
