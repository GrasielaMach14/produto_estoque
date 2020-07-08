<?php

namespace App\Http\Controllers;

use App\Setor;
use Illuminate\Http\Request;

class SetoresController extends Controller
{
    public function index(Request $request)
    {
        $setores = Setor::query()
                ->orderBy('nome')
                ->get();

        $mensagem = $request
                ->session()
                ->get('mensagem');

        // $setores = Setor::paginate(3);

        return view('setores.index', compact('setores', 'mensagem'));
    }

    public function show($id)
    {
        $setores = Setor::find($id);

        return view('setores.show', compact('setores'));
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {
        $setor = Setor::create($request->all());
        $request->session()
                    ->flash(
                    'mensagem', 'Setor criado com sucesso.'
                );
        
        return redirect()->route('listar_setores');
    }

    public function edit(int $id)
    {
        $setores = Setor::find($id);

        return view('setores.edit', compact('setores'));
    }

    public function update(Request $request, int $id)
    {
        $setores = Setor::find($id);
        $setores = $setores->update($request->all());
        $request->session()
                    ->flash(
                    'mensagem', 'Setor alterado com sucesso.'
                );
        
        return redirect()->route('listar_setores');

    }
   
    public function destroy(Request $request)
    {
        Setor::destroy($request->id);
        $request->session()
                    ->flash(
                    'mensagem', 'Setor removido com sucesso.'
                );
        
        return redirect()->route('listar_setores');
    }

}
