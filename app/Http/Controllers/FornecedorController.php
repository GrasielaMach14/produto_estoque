<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
        $fornecedores = Fornecedor::query()
                        ->orderBy('nome')
                        ->get();
        $mensagem = $request
                    ->session()
                    ->get('mensagem');
            
        $fornecedores = Fornecedor::paginate(4);

        return view('fornecedores.index', compact('fornecedores', 'mensagem'));
    }

    public function show($id)
    {
        $fornecedores = Fornecedor::find($id);

        return view('fornecedores.show', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $fornecedores = Fornecedor::create($request->all());
        $request->session()
                ->flash(
                    'mensagem', 
                    "Fornecedor {$fornecedores->nome} criado com sucesso."
                );

        return redirect()->route('listar_fornecedores');
    }

    public function edit(int $id)
    {
        $fornecedores = Fornecedor::find($id);
        
        return view('fornecedores.edit', compact('fornecedores'));
    }

    public function update(Request $request, int $id)
    {
        $fornecedores = Fornecedor::find($id);
        $fornecedores = $fornecedores->update($request->all());
        $request->session()
                    ->flash(
                        'mensagem', 
                        "Fornecedor alterado com sucesso."
                    );

        return redirect()->route('listar_fornecedores');
    }

    public function destroy(Request $request)
    {
        Fornecedor::destroy($request->id);
        $request->session()
                    ->flash(
                        'mensagem', 
                        "Fornecedor deletado com sucesso."
                    );
        return redirect()->route('listar_fornecedores');
    }
}
