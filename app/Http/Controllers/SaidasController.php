<?php

namespace App\Http\Controllers;

use App\Saida;
use App\Produto;
use App\Funcionario;
use Illuminate\Http\Request;

class SaidasController extends Controller
{
    public function index(Request $request)
    {
        $saidas = Saida::query()
                    ->orderBy('produto_id')
                    ->get();

        $mensagem = $request
                    ->session()
                    ->get('mensagem');

        $saidas = Saida::paginate(4);

        return view('saidas.index', compact('saidas', 'mensagem'));
    }

    public function show($id)
    {
        $saidas = Saida::find($id);

        return view('saidas.show', compact('saidas'));
    }

    public function create()
    {
        $produtos = Produto::all();
        $funcionarios = Funcionario::all();

        return view('saidas.create', compact('produtos', 'funcionarios'));
    }

    public function store(Request $request)
    {
        $saidas = Saida::create($request->all());

        $request->session()
        ->flash(
            'mensagem', 
            "Saida da movimentação de ID({$saidas->id}) criada com sucesso."
        );

        return redirect()->route('listar_saidas');
    }

    public function edit(int $id)
    {
        $saidas = Saida::find($id);
        $produtos = Produto::all();
        $funcionarios = Funcionario::all();

        return view('saidas.edit', compact('saidas', 'produtos', 'funcionarios'));
    }

    public function update(Request $request, int $id)
    {
        $saidas = Saida::find($id);
        $saidas = $saidas->update([
                'produto_id' => request('produto_id'), 
                'valor' => request('valor'),
                'funcionario_id' => request('funcionario_id'), 
                'quantidade' => request('quantidade'),
                'data_saida' => request('data_saida')
        ]);

        $request->session()
            ->flash(
                'mensagem', 
                "Saída da movimentação alterada com sucesso."
            );
            
        return redirect()->route('listar_saidas');
    }
    
    public function destroy(Request $request)
    {
        Saida::destroy($request->id);
        $request->session()
                    ->flash(
                        'mensagem',
                        "Saída da movimentação removida com sucesso"
                        );

        return redirect()->route('listar_saidas');
    }




}
