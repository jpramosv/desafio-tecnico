<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {
    return 'Hello, World!';
});
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/login', function(){ return 'Login'; })->name('site.login');


Route::prefix('/app')->group(function(){
    Route::get('/pessoas', [\App\Http\Controllers\PessoaController::class,'index'])->name('app.pessoa');
    Route::post('/pessoas/listar', [\App\Http\Controllers\PessoaController::class,'listar'])->name('app.pessoa.listar');
    Route::get('/pessoas/listar', [\App\Http\Controllers\PessoaController::class,'listar'])->name('app.pessoa.listar');
    Route::get('/pessoas/salvar', [\App\Http\Controllers\PessoaController::class,'salvar'])->name('app.pessoa.salvar');
    Route::post('/pessoas/salvar', [\App\Http\Controllers\PessoaController::class,'salvar'])->name('app.pessoa.salvar');
    Route::get('/pessoas/editar/{id}/{msg?}', [\App\Http\Controllers\PessoaController::class,'editar'])->name('app.pessoa.editar');
    Route::get('/pessoas/excluir/{id}', [\App\Http\Controllers\PessoaController::class,'excluir'])->name('app.pessoa.excluir');
    Route::get('/categoria', [\App\Http\Controllers\CategoriaController::class,'categoria'])->name('app.categoria.categoria_salvar');
    Route::post('/categoria', [\App\Http\Controllers\CategoriaController::class,'salvar'])->name('app.categoria.categoria_salvar');
    Route::get('/transacoes', function(){ return 'Transações'; })->name('app.transacoes');

    //titulos
    Route::resource('titulo',App\Http\Controllers\TituloController::class);

});





Auth::routes();


