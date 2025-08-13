<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato.salvar');
Route::get('/login', function() {return "Login";})->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/clientes', [ClientesController::class, 'clientes'])
        ->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'fornecedores'])
        ->name('app.fornecedores');

    Route::get('/produtos', [ProdutosController::class, 'produtos'])
        ->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');


Route::fallback(function() {
    echo 'A rota não existe. <a href="'.route('site.index').'">Clique aqui </a> para ir pra página inicial';

});
