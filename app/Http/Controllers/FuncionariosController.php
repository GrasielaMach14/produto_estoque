<?php

namespace App\Http\Controllers;

use App\Setor;
use App\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function index(Request $request)   
    {
        $funcionarios = Funcionario::query()
                            ->orderBy('nome')
                            ->get();

        $mensagem = $request
                ->session()
                ->get('mensagem');

        $funcionarios = Funcionario::with('setor')
                                    ->get();

        $funcionarios = Funcionario::paginate(3);

        return view('funcionarios.index', compact('funcionarios', 'mensagem'));
    }

    public function show($id)
    {
        $funcionarios = Funcionario::find($id);

        return view('funcionarios.show', compact('funcionarios'));
    }

    public function create()
    {
        $setores = Setor::all();

        return view('funcionarios.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $funcionarios = Funcionario::create($request->all());

        $request->session()
            ->flash(
                'mensagem', 
                "Funcionário cadastrado com sucesso."
            );

        //dd($funcionarios);
        return redirect()->route('listar_funcionarios');
    }

    public function edit(int $id)
    {
        $funcionarios = Funcionario::find($id);
        $setores = Setor::all();

        return view('funcionarios.edit', compact('funcionarios', 'setores'));

    }

    public function update(Request $request, int $id)
    {
        $funcionarios = Funcionario::find($id);
        $funcionarios = $funcionarios->update([
            'nome' => request('nome'), 
            'cpf' => request('cpf'),
            'setor_id' => request('setor_id'), 
        ]);
        
        $request->session()
            ->flash(
                'mensagem', 
                "Funcionário alterado com sucesso."
            );


        return redirect()->route('listar_funcionarios');
    }

    public function destroy(Request $request)
    {
        Funcionario::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem', 
                "Funcionário excluído com sucesso."
            );


        return redirect()->route('listar_funcionarios');
    }
}
