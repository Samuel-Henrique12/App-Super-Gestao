<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function produtos() {
        return view('site.sobre-nos', ['titulo' => 'Sobre Nós']);
    }
}
