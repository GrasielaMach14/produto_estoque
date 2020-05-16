<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    public function index(Request $request)
    {
        $setores = Sector::query()
                ->orderBy('nome')
                ->get();
        $mensagem = $request
                ->session()
                ->get('mensagem');

        $setores = Sector::paginate(3);

        return view('setores.index', compact('setores', 'mensagem'));
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {
        $setor = Sector::create($request->all());
        $request->session()
                    ->flash(
                    'mensagem', 'Setor {$setor->nome} criado com sucesso.'
                );
        
        return redirect()->route('listar_setores');
    }

    public function edit(int $id)
    {
        $setores = Sector::find($id);

        return view('setores.edit', compact('setores'));
    }

    public function update(Request $request, int $id)
    {
        $setores = Sector::find($id);
        $setores = $setores->update($request->all());
        $request->session()
                    ->flash(
                    'mensagem', 'Setor alterado com sucesso.'
                );
        
        return redirect()->route('listar_setores');

    }

    public function destroy(Request $request)
    {
        Sector::destroy($request->id);
        $request->session()
                    ->flash(
                    'mensagem', 'Setor removido com sucesso.'
                );
        
        return redirect()->route('listar_setores');
    }
}
