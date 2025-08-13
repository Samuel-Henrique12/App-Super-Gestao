<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request) {
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
          'usuario.email' => 'Insira um e-mail valido!',
          'usuario.required' => 'O campo usuário é obrigatório!' ,
          'senha.required' => 'O campo senha é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuario: $email </n> Senha: $password </n>";


    }
}
