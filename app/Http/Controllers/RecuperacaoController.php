<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperacaoController extends Controller
{
    public function index() {
        return view('site.recuperacao');
    }

    public function recuperacao(Request $request) {

    }
}
