<?php

namespace App\Http\Controllers;

use App\Estoque;
use App\Produto;
use App\Entrada;
use App\Saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class EstoquesController extends Controller
{
    public function index(Request $request)
    {
        $estoques = Estoque::query()
                    ->orderBy('id')
                    ->get();

        // $estoques = DB::table('estoques')
        //             ->join('entradas', 'estoques.id', '=', 'entradas.produto_id')
        //             ->join('saidas', 'estoques.id', '=', 'saidas.produto_id')
        //             ->select('estoques.*')
        //             ->get();
    
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
        $entradas = Entrada::all();
        $saidas = Saida::all();

        return view('estoques.create', compact('produtos', 'saidas', 'entradas'));
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
        $entradas = Entrada::all();
        $saidas = Saida::all();

        return view('estoques.edit', compact('estoques', 'produtos', 'saidas', 'entradas'));
    }

    public function update(Request $request, int $id)
    {
        $estoques = Estoque::find($id);
        $estoques = $estoques->update([
            'produto_id' => request('produto_id'), 
            'entrada_id' => request('entrada_id'),
            'saida_id' => request('saida_id')
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
