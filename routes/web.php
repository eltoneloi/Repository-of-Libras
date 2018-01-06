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

Route::get('/','HomeController@index');
//Para listar todas as disciplinas
Route::get('/home', 'HomeController@index')->name('home');
//Para listar todas as categorias
Route::get('/category/{id}','categoryController@show')->name('listCategory');
//Para lista todas as categorias baseada no id de uma category
Route::get('/backCategory/{id}','categoryController@showById')->name('backListCategory');
//Para listar todas as palavras
Route::get('/category/{id}/words','wordController@show')->name('listWord');

Route::get('/word/{word_id}','wordController@searchGesture')->name('gesture');
//Para exibir pagina de contribuição
Route::get('/contribute/{contributionSuccess?}', 'contributeController@searchContexts')->name('contribute');
//Usado para achamda ajax que retorna todas as categorias relacionadas a disciplina escolhida
Route::get('/contribute/context_id/{id}', 'contributeController@searchCategories')->name('loadCategoriesToContribute');
//Para cadastrar um novo termo via ajax
Route::post('/contribute', 'contributeController@store')->name('createContribute');
//Para criar uma nova avaliaçao, requisição via com ajax
Route::get('/gesture/{gesture_id}/createEvaluation/{evaluation}','wordController@createEvaluation');
//Para alter uma avaliação requisição com ajax
Route::get('/evaluation/{evaluation_id}alterEvaluation/{evaluation}','wordController@alterEvaluation');
//Para recuperar os dados de avaliação de um gesto
Route::get('/evaluation/gesture/{gesture_id}','wordController@getDataEvaluation')->name('getDataEvaluation');
//Para verificar autenticação
Route::get('/checkAuthenticationToEvaluate','wordController@checkAuthenticationToEvaluate')->name('checkAuthenticationToEvaluate');
//Para verificar se os botões de avaliações devem ser bloqueados em caso de já exesistir uma avalaição do usuario
Route::get('/blockButtonEvaluation/{gesture_id}','wordController@blockButtonEvaluation')->name('blockButtonEvaluation');
Route::get('/download/ontology', 'DownloadsController@getDownloadOntologyRDF')->name('ontologyDownload');

Auth::routes();


