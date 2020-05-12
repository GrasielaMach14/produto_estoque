<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function index(Request $request) 
    {
        $produtos = Produto::query()
                    ->orderBy('nome')
                    ->get();
        $mensagem = $request
                    ->session()
                    ->get('mensagem');

        $produtos = Produto::paginate(4);

        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    public function home()
    {
        return view('produtos.home');
    }
    
    public function create()
    {
        $categorias = Categoria::all();

        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $produtos = Produto::create([
                'nome' => request('nome'), 
                'descricao' => request('descricao'), 
                'preco' => request('preco'),
                'categoria_id' => request('categoria_id')
            ]);

        $request->session()
            ->flash(
                'mensagem', 
                "Produto {$produtos->nome} criado com sucesso."
            );

            return redirect()->route('listar_produtos');
    }


    public function edit(int $id)
    {
        $produtos = Produto::find($id);
        $categorias = Categoria::all();
        //dd($produtos);
        return view('produtos.edit', compact('produtos', 'categorias'));
    }

    public function update(Request $request, int $id)
    {
        $produtos = Produto::find($id);
        $categorias = Categoria::all();
        $produtos = $produtos->update([
                'nome' => request('nome'), 
                'descricao' => request('descricao'), 
                'preco' => request('preco'),
        ]);

        $request->session()
            ->flash(
                'mensagem', 
                "Produto alterado com sucesso."
            );
            
        return redirect()->route('listar_produtos');
    }
    
    public static function pesquisar(Request $request, Produto $nome)
    {
       $produtos = Produto::pesquisar($request->nome);
        
        return view('produtos.index', ['produtos' => $produtos, 'nome' => $nome]);
    }
    public function destroy(Request $request)
    {
        Produto::destroy($request->id);
        $request->session()
                    ->flash(
                        'mensagem',
                        "Produto removido com sucesso"
                        );

        return redirect()->route('listar_produtos');
    }
}
