<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Produto;
use App\Fornecedor;
use App\Funcionario;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    public function index(Request $request)
    {
        $entradas = Entrada::query()
                    ->orderBy('produto_id')
                    ->get();

        $mensagem = $request
                    ->session()
                    ->get('mensagem');

        $entradas = Entrada::paginate(4);

        return view('entradas.index', compact('entradas', 'mensagem'));
    }

    public function show($id)
    {
        $entradas = Entrada::find($id);

        return view('entradas.show', compact('entradas'));
    }

    public function create()
    {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $funcionarios = Funcionario::all();

        return view('entradas.create', compact('produtos', 'fornecedores', 'funcionarios'));
    }

    public function store(Request $request)
    {
        $entradas = Entrada::create($request->all());

        $request->session()
        ->flash(
            'mensagem', 
            "Entrada da movimentação de ID({$entradas->id}) criada com sucesso."
        );

        return redirect()->route('listar_estoques');
    }

    public function edit(int $id)
    {
        $entradas = Entrada::find($id);
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $funcionarios = Funcionario::all();

        return view('entradas.edit', compact('entradas', 'produtos', 'fornecedores', 'funcionarios'));
    }

    public function update(Request $request, int $id)
    {
        $entradas = Entrada::find($id);
        $entradas = $entradas->update([
                'produto_id' => request('produto_id'), 
                'fornecedor_id' => request('fornecedor_id'),
                'funcionario_id' => request('funcionario_id'), 
                'quantidade' => request('quantidade'),
                'data_entrada' => request('data_entrada')
        ]);

        $request->session()
            ->flash(
                'mensagem', 
                "Entrada da movimentação alterada com sucesso."
            );
            
        return redirect()->route('listar_estoques');
    }

    public function destroy(Request $request)
    {
        Entrada::destroy($request->id);
        $request->session()
                    ->flash(
                        'mensagem',
                        "Entrada da movimentação removida com sucesso"
                        );

        return redirect()->route('listar_entradas');
    }

}
