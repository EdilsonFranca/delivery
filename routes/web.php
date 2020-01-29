<?php
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/fale-conosco', 'FaleConoscoController@pag');
Route::get('/sobre-nos', 'SobreNosController@pag');
Route::post('/area-de-entrega', 'Auth\RegisterController@listar');
Route::post('/produtos/area-de-entrega/novo', 'ProdutoController@cadastrar')->middleware("admin");
Route::get('/produtos','ProdutoController@listar')->middleware('admin');
Route::get('/produtos/novo','ProdutoController@novo')->middleware('admin');
Route::post('/produtos/adiciona','ProdutoController@adiciona')->middleware('admin');
Route::get('/produtos/remove/{id}','ProdutoController@remove')->middleware('admin')->where('id', '[0-9]+');

Route::get('/busca-categoria/{id}', 'HomeController@busca_por_categoria')->where('id', '[0-9]+');
Route::post('/adiciona-promocao', 'ProdutoController@adicionaPromocao')->middleware('admin');
Route::post('/remove-promocao', 'ProdutoController@removePromocao')->middleware('admin');
Route::post('/remove-categoria', 'ProdutoController@removeCategoria')->middleware('admin');
Route::post('/produtos/adiciona-categoria', 'ProdutoController@adicionaCategoria')->middleware('admin');
Route::get('session/get','SessionController@accessSessionData');
Route::post('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');
Route::post('send-email', 'EmailController@sendEMail');



