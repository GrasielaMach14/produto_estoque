<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Entrada;
use App\Saida;
use App\Fornecedor;
use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class EstoquesController extends Controller
{
    public function index(Request $request)
    {
        $estoques = Entrada::query()
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
                        
        // $estoques = Estoque::paginate(4);

        return view('estoques.index', compact('estoques', 'mensagem'));                    
    }

    // public function show($id)
    // {
    //     $estoques = Estoque::find($id);

    //     return view('estoques.show', compact('estoques'));
    // }

    public function createntrada()
    {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $funcionarios = Funcionario::all();

        return view('estoques.createntrada', 
                    compact('produtos', 'fornecedores', 'funcionarios'));
    }

    public function addentrada()
    {      
        $request = Request();

        $produto_id = $request->input('id');

        $produto = Produto::find($produto_id);

        // if(empty($produto->id)) 
        // {
        //     $request->session()
        //         ->flash(
        //             'mensagem', 'Produto não encontrado.'
        //         );

        //     return redirect()->route('listar_estoques');
        // }

        Entrada::create($request->all());

        $request->session()
                    ->flash(
                    'mensagem', 'Entrada de produto criada com sucesso.'
                );
                
        return redirect()->route('listar_estoques');
    }

    public function createsaida()
    {
        $produtos = Produto::all();
        $funcionarios = Funcionario::all();

        return view('estoques.createsaida', compact('produtos', 'funcionarios'));
    }

    public function addsaida()
    {       
        $request = Request();

        $entrada_id = $request->input('id');

        $entrada = Entrada::find($entrada_id);
        
        Saida::create($request->all());

        $request->session()
                ->flash(
                    'mensagem', 'Saída de produto registrada com sucesso.'
                );
        
        return redirect()->route('listar_estoques');

        // if(!empty($entrada->id)) 
        // {
        // }else{
        //     $request->session()
        //             ->flash(
        //                 'mensagem', 'Não há registro de entrada deste produto.'
        //             );
            
        //     return redirect()->route('listar_estoques');
        // }

    }

    // public function edit(int $id)
    // {
    //     $estoques = Estoque::find($id);
    //     $produtos = Produto::all();
    //     $entradas = Entrada::all();
    //     $saidas = Saida::all();

    //     return view('estoques.edit', compact('estoques', 'produtos', 'saidas', 'entradas'));
    // }

    // public function update(Request $request, int $id)
    // {
    //     $estoques = Estoque::find($id);
    //     $estoques = $estoques->update([
    //         'produto_id' => request('produto_id'), 
    //         'entrada_id' => request('entrada_id'),
    //         'saida_id' => request('saida_id')
    //          ]);

    //         $request->session()
    //             ->flash(
    //             'mensagem', 'Movimentação do estoque alterado com sucesso.'
    //         );
        

    //     return redirect()->route('listar_estoques');
    // }

    // public function destroy(Request $request)
    // {
    //     Estoque::destroy($request->id);

    //     $request->session()
    //                 ->flash(
    //                 'mensagem', 'Movimentação do estoque excluído com sucesso.'
    //             );
        

    //     return redirect()->route('listar_estoques');
    // }
}
