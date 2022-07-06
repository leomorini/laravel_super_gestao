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
    Route::get('/clientes', 'ContatoController@index')->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', 'ContatoController@index')->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@index')->name('teste.index')->where('p1', '[0-9]+')->where('p2', '[0-9]+');

Route::fallback('FallbackController@index');
