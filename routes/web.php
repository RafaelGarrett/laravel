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

Route::get('/avaliacao', 'AvaliacaoController@index')->name('listar_avaliacao');
Route::get('/avaliacao/create', 'AvaliacaoController@create');
Route::post('/avaliacao', 'AvaliacaoController@store');
Route::get('/avaliacao/{id}/edit', 'AvaliacaoController@edit');
Route::put('/avaliacao/{id}', 'AvaliacaoController@update');
Route::get('/', 'AvaliacaoController@index');

Route::get('/avaliacao/{avalId}/tarefas', 'TarefaController@index')->name('listar_tarefa');
Route::get('/avaliacao/{avalId}/tarefa/create', 'TarefaController@create');
Route::post('/avaliacao/{avalId}/tarefa', 'TarefaController@store');
Route::get('/avaliacao/{avalId}/tarefa/{id}/edit', 'TarefaController@edit');
Route::put('/avaliacao/{avalId}/tarefa/{id}', 'TarefaController@update');

Auth::routes();
Route::get('/login','LoginController@index')->name('login');
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');
Route::get('/register','RegisterController@create');
Route::post('/register','RegisterController@store');

Route::delete('/user/{id}','UserController@destroy');

Route::get('/home', 'HomeController@index');
Route::get('/estabelecimentos', 'EstabelecimentoController@index');