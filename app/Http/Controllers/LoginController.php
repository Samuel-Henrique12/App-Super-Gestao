<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessario realizar login pra ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Insira um e-mail valido!',
            'usuario.required' => 'O campo usuário é obrigatório!',
            'senha.required' => 'O campo senha é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $usuario = User::where('email', $email)->first();

        if ($usuario && Hash::check($password, $usuario->password)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        return
        session_destroy();
        return redirect()->route('site.index');
    }
}

