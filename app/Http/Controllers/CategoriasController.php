<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasFormRequest;

class CategoriasController extends Controller
{
    public function index(Request $request) 
    {
        $categorias = Categoria::query()
                        ->orderBy('nome')
                        ->get();
        $mensagem = $request
                    ->session()
                    ->get('mensagem');
                    
        $categorias = Categoria::paginate(3);

        return view('categorias.index', compact('categorias', 'mensagem'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriasFormRequest $request)
    {
        $categoria = Categoria::create($request->all());
        $categoria = Categoria::paginate(3);

        $request->session()
                ->flash(
                    'mensagem', 
                    "Categoria {$categoria->nome} criada com sucesso."
                );

        return redirect()->route('listar_categorias');
    }

    public function edit(int $id)
    {
        $categorias = Categoria::find($id);
        //dd($categorias);
        return view('categorias.edit', compact('categorias'));
    }

    public function update(Request $request, int $id)
    {
        $categorias = Categoria::find($id);
        $categorias = $categorias->update($request->all());

        $request->session()
            ->flash(
                'mensagem', 
                "Produto alterado com sucesso."
            );
            
        return redirect()->route('listar_categorias');
    }

    public function destroy(Request $request)
    {
        Categoria::destroy($request->id);
        $request->session()
                    ->flash(
                        'mensagem',
                        "Categoria removida com sucesso"
                        );

        return redirect()->route('listar_categorias');
    }
}
