<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\Auth\EsqueceuSenhaController;
use App\Http\Controllers\Auth\RecuperacaoController;
use Illuminate\Support\Facades\Route;

// SITE

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato.salvar');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
Route::get('/registro', [RegistroController::class, 'index'])->name('site.registro');
Route::post('/registro', [RegistroController::class, 'cadastro'])->name('site.registro');
Route::get('esqueceu-senha', [EsqueceuSenhaController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('esqueceu-senha', [EsqueceuSenhaController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('redefinir-senha/{token}', [RecuperacaoController::class, 'showResetForm'])->name('password.reset');
Route::post('redefinir-senha', [RecuperacaoController::class, 'reset'])->name('password.update');

// APP

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/cliente/adicionar',[ClienteController::class, 'adicionar'])->name('app.cliente.adicionar');
    Route::post('/cliente/adicionar',[ClienteController::class, 'guardar'])->name('app.cliente.guardar');
    Route::get('/cliente/editar/{cliente}',[ClienteController::class, 'editar'])->name('app.cliente.editar');
    Route::put('/cliente/editar/{cliente}',[ClienteController::class, 'atualizar'])->name('app.cliente.atualizar');
    Route::delete('/cliente/excluir/{cliente}', [ClienteController::class, 'destroy'])->name('app.cliente.excluir');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'guardar'])->name('app.fornecedor.guardar');
    Route::get('/fornecedor/editar/{id}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::put('/fornecedor/editar/{id}', [FornecedorController::class, 'update'])->name('app.fornecedor.update');
    Route::delete('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
    Route::get('/produto/adicionar', [ProdutoController::class, 'adicionar'])->name('app.produto.adicionar');
    Route::post('/produto/adicionar', [ProdutoController::class, 'guardar'])->name('app.produto.guardar');
    Route::get('/produto/editar/{id}', [ProdutoController::class, 'editar'])->name('app.produto.editar');
    Route::put('/produto/editar/{id}', [ProdutoController::class, 'update'])->name('app.produto.update');
    Route::delete('/produto/excluir/{id}', [ProdutoController::class, 'excluir'])->name('app.produto.excluir');

});

Route::fallback(function() {
    echo 'A rota não existe. <a href="'.route('site.index').'">Clique aqui para ir pra página inicial </a>';

});
