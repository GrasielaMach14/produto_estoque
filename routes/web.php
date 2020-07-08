<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

#Categorias controller
Route::get('/categorias', 'CategoriasController@index')
                            ->name('listar_categorias');
Route::get('/categorias/{id}', 'CategoriasController@show');
Route::get('/categorias/criar', 'CategoriasController@create')
                                ->name('form_criar_categorias')
                                ->middleware('autenticador');
Route::post('/categorias/criar', 'CategoriasController@store')
                                ->middleware('autenticador');
Route::put('/categorias/update/{id}', [ 'as' => 'categorias.update', 
                            'uses' =>'CategoriasController@update'])
                            ->middleware('autenticador');
Route::get('/categorias/{id}/edit', 'CategoriasController@edit')
                                    ->middleware('autenticador');
Route::delete('/categorias/remover/{id}', 'CategoriasController@destroy')
                                            ->middleware('autenticador');
#Produtos controller
Route::get('/produtos', 'ProdutosController@index')
                        ->name('listar_produtos');
Route::get('/produtos/home', 'ProdutosController@home');

Route::get('/produtos/criar', 'ProdutosController@create')
                            ->name('form_criar_produtos')
                            ->middleware('autenticador');
Route::post('/produtos/criar', 'ProdutosController@store')
->middleware('autenticador');
Route::get('/produtos/{id}/edit', 'ProdutosController@edit')
->middleware('autenticador')
->name('editar_produto');
Route::put('/produtos/update/{id}', [ 'as' => 'produtos.update', 
'uses'=>'ProdutosController@update'])
->middleware('autenticador');
Route::delete('produtos/remover/{id}', 'ProdutosController@destroy')
->middleware('autenticador')
->name('deletar_produto');
Route::get('/produtos/{id}', 'ProdutosController@show')
                            ->name('visualizar_produto');
#Setores controller                    
Route::get('/setores', 'SetoresController@index')
                        ->name('listar_setores');
Route::get('/setores/criar', 'SetoresController@create');
Route::post('/setores/criar', 'SetoresController@store');
Route::get('/setores/{id}/edit', 'SetoresController@edit');
Route::put('/setores/update/{id}', [ 'as' => 'setores.update', 
                        'uses' => 'SetoresController@update']);
Route::delete('/setores/remover/{id}', 'SetoresController@destroy');
Route::get('/setores/{id}', 'SetoresController@show');
#Funcionários controller
Route::get('/funcionarios', 'FuncionariosController@index')
                        ->name('listar_funcionarios');
Route::get('/funcionarios/criar', 'FuncionariosController@create');
Route::post('/funcionarios/criar', 'FuncionariosController@store');
Route::get('/funcionarios/{id}/edit', 'FuncionariosController@edit');
Route::put('/funcionarios/update/{id}', [ 'as' => 'funcionarios.update',
                             'uses' => 'FuncionariosController@update']);
Route::delete('/funcionarios/remover/{id}', 'FuncionariosController@destroy');
Route::get('/funcionarios/{id}', 'FuncionariosController@show');
#Fornecedores controller
Route::get('/fornecedores', 'FornecedorController@index')
                            ->name('listar_fornecedores');
Route::get('/fornecedores/criar', 'FornecedorController@create')
                                ->name('form_criar_fornecedores')
                                ->middleware('autenticador');
Route::post('/fornecedores/criar', 'FornecedorController@store')
                                ->middleware('autenticador');
Route::get('/fornecedores/{id}/edit', 'FornecedorController@edit')
                                ->middleware('autenticador')
                                ->name('editar_fornecedores');
Route::put('/fornecedores/update/{id}', [ 'as' => 'fornecedores.update', 
                                'uses' =>'FornecedorController@update'])
                                ->middleware('autenticador');
Route::delete('fornecedores/remover/{id}', 'FornecedorController@destroy')
                                            ->middleware('autenticador')
                                            ->name('deletar_fornecedores');
Route::get('/fornecedores/{id}', 'FornecedorController@show')
                            ->name('visualizar_fornecedores');
#Estoque Controller
Route::get('/estoques', 'EstoquesController@index')
                            ->name('listar_estoques');
// Route::get('/estoques/{id}', 'EstoquesController@show')
//                             ->name('visualizar_estoque');
Route::get('/estoques/criarentrada', 'EstoquesController@createntrada')
                                ->name('form_criar_entrada')
                                ->middleware('autenticador');
Route::post('/estoques/criarentrada', 'EstoquesController@addentrada')
                                ->middleware('autenticador');
Route::get('/estoques/criarsaida', 'EstoquesController@createsaida')
                                ->name('form_criar_saida')
                                ->middleware('autenticador');
Route::post('/estoques/criarsaida', 'EstoquesController@addsaida')
                                ->middleware('autenticador');
Route::get('/estoques/{id}/edit', 'EstoquesController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_estoque');
Route::put('/estoques/update/{id}', [ 'as' => 'estoques.update',
                        'uses' =>'EstoquesController@update'])
                        ->middleware('autenticador');
Route::delete('/estoques/remover/{id}', 'EstoquesController@destroy')
                                        ->middleware('autenticador');

Route::get('/entradas', 'EntradasController@index')
                            ->name('listar_entradas');
Route::get('/entradas/{id}', 'EntradasController@show')
                        ->name('visualizar_entradas');
Route::get('/entradas/criar', 'EntradasController@create')
                                ->name('form_criar_entradas')
                                ->middleware('autenticador');
Route::post('/entradas/criar', 'EntradasController@store')
                                ->middleware('autenticador');
Route::get('/entradas/{id}/edit', 'EntradasController@edit')
                                    ->middleware('autenticador')
                                    ->name('editar_entradas');
Route::put('/entradas/update/{id}', [ 'as' => 'entradas.update', 
                        'uses' =>'EntradasController@update'])
                        ->middleware('autenticador');
Route::delete('/entradas/remover/{id}', 'EntradasController@destroy')
                                        ->middleware('autenticador');
                                        
Route::get('/saidas', 'SaidasController@index')
                        ->name('listar_saidas');
Route::get('/saidas/{id}', 'SaidasController@show')
                        ->name('visualizar_saidas');
Route::get('/saidas/criar', 'SaidasController@create')
                            ->name('form_criar_saidas')
                            ->middleware('autenticador');
Route::post('/saidas/criar', 'SaidasController@store')
                            ->middleware('autenticador');
Route::get('/saidas/{id}/edit', 'SaidasController@edit')
                            ->middleware('autenticador')
                            ->name('editar_saidas');
Route::put('/saidas/update/{id}', [ 'as' => 'saidas.update', 
                        'uses' =>'SaidasController@update'])
                        ->middleware('autenticador');
Route::delete('/saidas/remover/{id}', 'SaidasController@destroy')
                                    ->middleware('autenticador');

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