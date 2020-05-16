@extends('layout')

@section('cabecalho')
Atualizar Funcionário
@endsection

@section('conteudo')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('funcionarios.update', $funcionarios->id, $funcionarios->categoria_id) }}" method="post">
        {{ method_field('PUT') }}
        @csrf
        <div class="row">
            <div class="col col-6">
                <label for="sector_id">Setor:</label>
                <select name="sector_id" id="sector_id" class="form-control">
                    <option>Selecione...</option>
                    @foreach($setores as $s)
                    <option value="{{ $s->id }}">{{ $s->nome }}</option>
                    @endforeach
                </select>
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $funcionarios->nome }}">
                <label for="cpf">Descrição:</label>
                <input type="text" class="form-control" name="cpf" value="{{ $funcionarios->cpf }}"> 
            </div>
        </div>
            <div style="margin-right: 35%;">
                <button class="btn btn-primary mt-5 float-right">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2">Voltar</a>
            </div>
        <div class="col col-2">
        </div>
    </form>

@endsection