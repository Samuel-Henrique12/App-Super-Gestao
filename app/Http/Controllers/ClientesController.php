<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function clientes() {
        return view('site.sobre-nos', ['titulo' => 'Sobre Nós']);
    }
}
