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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Usuários
Route::get('/user', 
'UsersController@index');

Route::post('/user/salvar',
'UsersController@salvar');

Route::get('/user/listagem',
'UsersController@lista');

Route::get('/user/excluir',
 'UsersController@excluir');

//Tipo de animais
Route::get('/tipo', 
'TipoController@index');

Route::post('/tipo/salvar',
'TipoController@salvar');

Route::get('/tipo/listagem',
'TipoController@listar');

Route::get('/tipo/excluir',
 'TipoController@excluir');

//Animais
Route::get('/animal', 
'AnimalController@index');

Route::post('/animal/salvar',
'AnimalController@salvar');

Route::get('/animal/listagem',
'AnimalController@listar');

Route::get('/animal/excluir',
 'AnimalController@excluir');

//Atendimento
Route::get('/atendimento', 
'AtendimentoController@index');

Route::post('/atendimento/salvar',
'AtendimentoController@salvar');

Route::get('/atendimento/listagem',
'AtendimentoController@listar');

Route::get('/atendimento/excluir',
 'AtendimentoController@excluir');

//Autenticação
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

