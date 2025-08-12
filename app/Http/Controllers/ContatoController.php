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

        dd($request->all());
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);
//        SiteContato::create($request->all());
    }
}
