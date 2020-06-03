<?php

namespace App\Http\Controllers;

use App\Estoque;
use App\Produto;
use App\Fornecedor;
use App\Funcionario;
use Illuminate\Http\Request;

class EstoquesController extends Controller
{
    public function index(Request $request)
    {
        $estoques = Estoque::query()
                    ->orderBy('id')
                    ->get();

        $mensagem = $request
                    ->session()
                    ->get('mensagem');
                        
        $estoques = Estoque::paginate(4);

        return view('estoques.index', compact('estoques', 'mensagem'));                    
    }

    public function show($id)
    {
        $estoques = Estoque::find($id);

        return view('estoques.show', compact('estoques'));
    }

    public function create()
    {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $funcionarios = Funcionario::all();

        return view('estoques.create', compact('produtos', 'fornecedores', 'funcionarios'));
    }

    public function store(Request $request)
    {
        $estoques = Estoque::create($request->all());
        
        $request->session()
                    ->flash(
                    'mensagem', 'Movimentação do estoque criado com sucesso.'
                );
                
        return redirect()->route('listar_estoques');
    }

    public function edit(int $id)
    {
        $estoques = Estoque::find($id);
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $funcionarios = Funcionario::all();

        return view('estoques.create', compact('produtos', 'fornecedores', 'funcionarios'));
    }

    public function update(Request $request, int $id)
    {
        $estoques = Estoque::find($id);
        $estoques = $estoques->update([
            'tipo_movimentacao' => request('tipo_movimentacao'), 
            'produto_id' => request('produto_id'), 
            'fornecedor_id' => request('fornecedor_id'),
            'funcionario_id' => request('funcionario_id'),
            'quantidade' => request('quantidade'), 
            'valor_total' => request('valor_total')
             ]);

            $request->session()
                ->flash(
                'mensagem', 'Movimentação do estoque alterado com sucesso.'
            );
        

        return redirect()->route('listar_estoques');
    }

    public function destroy(Request $request)
    {
        Estoque::destroy($request->id);

        $request->session()
                    ->flash(
                    'mensagem', 'Movimentação do estoque excluído com sucesso.'
                );
        

        return redirect()->route('listar_estoques');
    }
}
