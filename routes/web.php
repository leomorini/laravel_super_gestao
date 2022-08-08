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
|
*/

Route::get('/', 'PrincipalController@index')->name('site.index');
Route::get('/sobre', 'SobreNosController@index')->name('site.sobre');
Route::get('/contato', 'ContatoController@index')->name('site.contato');
Route::post('/contato', 'ContatoController@store')->name('site.contato');

Route::get('/login/{error?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@auth')->name('site.login');

Route::middleware('authentication:default')->prefix('app')->group(function() {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@logout')->name('app.sair');
    Route::get('/cliente', 'ClientController@index')->name('app.client');
    Route::get('/produto', 'ProductController@index')->name('app.produto');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    Route::get('/fornecedor/editar/{id}', 'FornecedorController@editar')->name('app.fornecedor.editar');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@index')->name('teste.index')->where('p1', '[0-9]+')->where('p2', '[0-9]+');

Route::fallback('FallbackController@index');
