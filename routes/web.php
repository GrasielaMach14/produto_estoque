<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/categorias', 'CategoriasController@index')
                            ->name('listar_categorias');

Route::get('/produtos', 'ProdutosController@index')
                        ->name('listar_produtos');

Route::get('/setores', 'SetoresController@index')
                        ->name('listar_setores');

Route::get('/funcionarios', 'FuncionariosController@index')
                        ->name('listar_funcionarios');

Route::get('/fornecedores', 'FornecedorController@index')
                            ->name('listar_fornecedores');

Route::get('/estoques', 'EstoquesController@index')
                            ->name('listar_estoques');

Route::get('/entradas', 'EntradasController@index')
                            ->name('listar_entradas');

Route::get('/saidas', 'SaidasController@index')
                            ->name('listar_saidas');

Route::get('/produtos/home', 'ProdutosController@home');

Route::get('/categorias/criar', 'CategoriasController@create')
                                ->name('form_criar_categorias')
                                ->middleware('autenticador');
                                
Route::get('/produtos/criar', 'ProdutosController@create')
                            ->name('form_criar_produtos')
                            ->middleware('autenticador');
                                
Route::get('/setores/criar', 'SetoresController@create');

Route::get('/funcionarios/criar', 'FuncionariosController@create');

Route::get('/fornecedores/criar', 'FornecedorController@create')
                                ->name('form_criar_fornecedores')
                                ->middleware('autenticador');

Route::get('/estoques/criar', 'EstoquesController@create')
                                ->name('form_criar_estoque')
                                ->middleware('autenticador');

Route::get('/entradas/criar', 'EntradasController@create')
                                ->name('form_criar_entradas')
                                ->middleware('autenticador');

Route::get('/saidas/criar', 'SaidasController@create')
                                ->name('form_criar_saidas')
                                ->middleware('autenticador');

Route::post('/categorias/criar', 'CategoriasController@store')
                                ->middleware('autenticador');

Route::post('/produtos/criar', 'ProdutosController@store')
                            ->middleware('autenticador');

Route::post('/setores/criar', 'SetoresController@store');

Route::post('/funcionarios/criar', 'FuncionariosController@store');

Route::post('/fornecedores/criar', 'FornecedorController@store')
                                ->middleware('autenticador');

Route::post('/estoques/criar', 'EstoquesController@store')
                                ->middleware('autenticador');

Route::post('/entradas/criar', 'EntradasController@store')
                                ->middleware('autenticador');

Route::post('/saidas/criar', 'SaidasController@store')
                                ->middleware('autenticador');

Route::put('/produtos/update/{id}', [ 'as' => 'produtos.update', 'uses'                 =>'ProdutosController@update'])
->middleware('autenticador');

Route::put('/categorias/update/{id}', [ 'as' => 'categorias.update', 'uses' =>'CategoriasController@update'])
->middleware('autenticador');

Route::put('/setores/update/{id}', [ 'as' => 'setores.update', 'uses' =>
'SetoresController@update']);

Route::put('/funcionarios/update/{id}', [ 'as' => 'funcionarios.update', 'uses' =>
'FuncionariosController@update']);

Route::put('/fornecedores/update/{id}', [ 'as' => 'fornecedores.update', 'uses' =>'FornecedorController@update'])
->middleware('autenticador');

Route::put('/estoques/update/{id}', [ 'as' => 'estoques.update', 'uses' =>'EstoquesController@update'])
->middleware('autenticador');

Route::put('/entradas/update/{id}', [ 'as' => 'entradas.update', 'uses' =>'EntradasController@update'])
->middleware('autenticador');

Route::put('/saidas/update/{id}', [ 'as' => 'saidas.update', 'uses' =>'SaidasController@update'])
->middleware('autenticador');

Route::get('/produtos/{id}/edit', 'ProdutosController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_produto');

Route::get('/categorias/{id}/edit', 'CategoriasController@edit')
                                        ->middleware('autenticador');

Route::get('/setores/{id}/edit', 'SetoresController@edit');

Route::get('/funcionarios/{id}/edit', 'FuncionariosController@edit');

Route::get('/fornecedores/{id}/edit', 'FornecedorController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_fornecedores');

Route::get('/estoques/{id}/edit', 'EstoquesController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_estoque');

Route::get('/entradas/{id}/edit', 'EntradasController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_entradas');

Route::get('/saidas/{id}/edit', 'SaidasController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_saidas');

Route::delete('/categorias/remover/{id}', 'CategoriasController@destroy')
                                                    ->middleware('autenticador');

Route::delete('produtos/remover/{id}', 'ProdutosController@destroy')
                                                ->middleware('autenticador')
                                                ->name('deletar_produto');

Route::delete('/setores/remover/{id}', 'SetoresController@destroy');

Route::delete('/funcionarios/remover/{id}', 'FuncionariosController@destroy');

Route::delete('fornecedores/remover/{id}', 'FornecedorController@destroy')
                                                ->middleware('autenticador')
                                                ->name('deletar_fornecedores');

Route::delete('/estoques/remover/{id}', 'EstoquesController@destroy')
                                                ->middleware('autenticador');

Route::delete('/entradas/remover/{id}', 'EntradasController@destroy')
                                                ->middleware('autenticador');

Route::delete('/saidas/remover/{id}', 'SaidasController@destroy')
                                                ->middleware('autenticador');

Route::get('/categorias/{id}', 'CategoriasController@show');

Route::get('/produtos/{id}', 'ProdutosController@show')
                            ->name('visualizar_produto');

Route::get('/setores/{id}', 'SetoresController@show');

Route::get('/funcionarios/{id}', 'FuncionariosController@show');

Route::get('/fornecedores/{id}', 'FornecedorController@show')
                            ->name('visualizar_fornecedores');

Route::get('/estoques/{id}', 'EstoquesController@show')
                            ->name('visualizar_estoque');

Route::get('/entradas/{id}', 'EntradasController@show')
                            ->name('visualizar_entradas');

Route::get('/saidas/{id}', 'SaidasController@show')
                            ->name('visualizar_saidas');

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