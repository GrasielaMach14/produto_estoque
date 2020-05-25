<?php

Route::get('/categorias', 'CategoriasController@index')
                            ->name('listar_categorias');

Route::get('/produtos', 'ProdutosController@index')
                        ->name('listar_produtos');

Route::get('/setores', 'SectorsController@index')
                        ->name('listar_setores');

Route::get('/funcionarios', 'FuncionariosController@index')
                        ->name('listar_funcionarios');

Route::get('/produtos/home', 'ProdutosController@home');

Route::get('/categorias/criar', 'CategoriasController@create')
                                ->name('form_criar_categorias')
                                ->middleware('autenticador');

                                
Route::get('/produtos/criar', 'ProdutosController@create')
                            ->name('form_criar_produtos')
                            ->middleware('autenticador');
                                
Route::get('/setores/criar', 'SectorsController@create');

Route::get('/funcionarios/criar', 'FuncionariosController@create');

Route::post('/categorias/criar', 'CategoriasController@store')
                                ->middleware('autenticador');

Route::post('/produtos/criar', 'ProdutosController@store')
                            ->middleware('autenticador');

Route::post('/setores/criar', 'SectorsController@store');

Route::post('/funcionarios/criar', 'FuncionariosController@store');

Route::put('/produtos/update/{id}', [ 'as' => 'produtos.update', 'uses' =>'ProdutosController@update'])
->middleware('autenticador');

Route::put('/categorias/update/{id}', [ 'as' => 'categorias.update', 'uses' =>'CategoriasController@update'])
->middleware('autenticador');

Route::put('/setores/update/{id}', [ 'as' => 'setores.update', 'uses' =>
'SectorsController@update']);

Route::put('/funcionarios/update/{id}', [ 'as' => 'funcionarios.update', 'uses' =>
'FuncionariosController@update']);

Route::get('/produtos/{id}/edit', 'ProdutosController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_produto');

Route::get('/categorias/{id}/edit', 'CategoriasController@edit')
                                        ->middleware('autenticador');

Route::get('/setores/{id}/edit', 'SectorsController@edit');

Route::get('/funcionarios/{id}/edit', 'FuncionariosController@edit');

Route::delete('/categorias/remover/{id}', 'CategoriasController@destroy')
                                                    ->middleware('autenticador');

Route::delete('produtos/remover/{id}', 'ProdutosController@destroy')
                                                ->middleware('autenticador')
                                                ->name('deletar_produto');

Route::delete('/setores/remover/{id}', 'SectorsController@destroy');

Route::delete('/funcionarios/remover/{id}', 'FuncionariosController@destroy');

Route::get('/categorias/{id}', 'CategoriasController@show');

Route::get('/produtos/{id}', 'ProdutosController@show')
                            ->name('visualizar_produto');

Route::get('/setores/{id}', 'SectorsController@show');

Route::get('/funcionarios/{id}', 'FuncionariosController@show');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'LoginController@index');

Route::post('/entrar', 'LoginController@entrar');

Route::get('/registrar', 'RegistroController@create');

Route::post('/registrar', 'RegistroController@store');

Route::any('/pesquisar/{id}','ProdutosController@pesquisar');

Route::get('/sair', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});