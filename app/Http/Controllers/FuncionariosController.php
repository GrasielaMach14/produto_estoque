<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function index(Request $request)   
    {
        $funcionarios = Funcionario::query()
                            ->orderBy('nome')
                            ->get();

        $funcionarios = Funcionario::with('setor')
                                    ->get();

        $funcionarios = Funcionario::paginate(4);

        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $setores = Sector::all();

        return view('funcionarios.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $funcionarios = Funcionario::create($request->all());
        //dd($funcionarios);
        return redirect()->route('listar_funcionarios');
    }

    public function edit(int $id)
    {
        $funcionarios = Funcionario::find($id);
        $setores = Sector::all();

        return view('funcionarios.edit', compact('funcionarios', 'setores'));

    }

    public function update(Request $request, int $id)
    {
        $funcionarios = Funcionario::find($id);
        $setores = Sector::all();
        $funcionarios = $funcionarios->update([
            'nome' => request('nome'), 
            'cpf' => request('cpf'), 
        ]);

        return redirect()->route('listar_funcionarios');
    }

    public function destroy(Request $request)
    {
        Funcionario::destroy($request->id);

        return redirect()->route('listar_funcionarios');
    }
}
