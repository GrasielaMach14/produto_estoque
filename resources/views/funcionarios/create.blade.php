@extends('layout')

@section('cabecalho')
Adicionar Funcionarios
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/funcionarios">Tela principal</a></li>
</ul>
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
    <div class="card">
        <div class="card-body">
            <form method="post">
            @csrf
                <div class="form-group">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" class="form-control" name="matricula" placeholder="000.000-000" onkeypress="$(this).mask('000.000-000')">
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00" onkeypress="$(this).mask('000.000.000-00');">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="setor_id">Setor:</label>
                        <select name="setor_id" id="setor_id" class="form-control">
                            <option>Selecione...</option>
                            @foreach($setores as $s)
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary mt-5 float-right" style="width:130px;">Adicionar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2" style="width:130px;">Voltar</a>
                <br><br><br><br><br><br>
            </form>          
        </div>
    </div>

@endsection