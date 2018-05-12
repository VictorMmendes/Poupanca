<?php

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

Route::get('/', 'PessoaController@listar');

Route::get('/pessoa/info/{id}', 'PessoaController@info');
Route::post('/pessoa/saldo/atualizar/{id}', 'PessoaController@atualizarSaldo');
Route::get('/pessoa/adicionar/', 'PessoaController@adicionar');
Route::post('/pessoa/salvar/', 'PessoaController@salvar');
