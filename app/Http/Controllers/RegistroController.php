<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function index() {
        return view('site.registro', ['titulo' => 'Cadastro']);
    }

    public function cadastro(Request $request) {
        // Regras de validação para o formulário de cadastro
        $regras = [
            'name' => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed',
        ];

        $feedback = [
            'name.required'         => "O campo nome é obrigatório",
            'email.required'        => 'O campo e-mail é obrigatório!',
            'email.email'           => 'Insira um e-mail válido!',
            'email.unique'          => 'Este e-mail já está em uso.',
            'password.required'     => 'O campo senha é obrigatório!',
            'password.confirmed'    => 'A confirmação da senha não corresponde.',
        ];

        $request->validate($regras, $feedback);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('site.login')->with('sucesso', 'Cadastro realizado com sucesso! Faça seu login.');
    }
}
