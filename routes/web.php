<?php

Route::get('/categorias', 'CategoriasController@index')
                            ->name('listar_categorias');

Route::get('/produtos', 'ProdutosController@index')
                        ->name('listar_produtos');

Route::get('/produtos/home', 'ProdutosController@home');

Route::get('/categorias/criar', 'CategoriasController@create')
                                ->name('form_criar_categorias')
                                ->middleware('autenticador');

Route::get('/produtos/criar', 'ProdutosController@create')
                                ->name('form_criar_produtos')
                                ->middleware('autenticador');

Route::post('/categorias/criar', 'CategoriasController@store')
                                            ->middleware('autenticador');

Route::post('/produtos/criar', 'ProdutosController@store')
                                            ->middleware('autenticador');

Route::put('/produtos/update/{id}', [ 'as' => 'produtos.update', 'uses' =>'ProdutosController@update'])
->middleware('autenticador');

Route::put('/categorias/update/{id}', [ 'as' => 'categorias.update', 'uses' =>'CategoriasController@update'])
->middleware('autenticador');

Route::get('/produtos/{id}', 'ProdutosController@edit')
                                    ->middleware('autenticador');

Route::get('/categorias/{id}', 'CategoriasController@edit')
                                        ->middleware('autenticador');

Route::delete('/categorias/remover/{id}', 'CategoriasController@destroy')
                                                    ->middleware('autenticador');

Route::delete('produtos/remover/{id}', 'ProdutosController@destroy')
                                                ->middleware('autenticador');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'LoginController@index');

Route::post('/entrar', 'LoginController@entrar');

Route::get('/registrar', 'RegistroController@create');

Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});