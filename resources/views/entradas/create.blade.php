@extends('layout')

@section('cabecalho')
Registrar Entrada
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/entradas">Tela principal</a></li>
    <li><a href="/estoques">Estoque</a></li>
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="produto_id">Produto:</label>
                        <select name="produto_id" id="produto_id" class="form-control custom-select"> 
                            <option>Selecione...</option>
                            @foreach($produtos as $p)
                            <option value="{{ $p->id }}">{{ $p->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fornecedor_id">Fornecedor:</label>
                        <select name="fornecedor_id" id="fornecedor_id" class="form-control custom-select"> 
                            <option>Selecione...</option>
                            @foreach($fornecedores as $f)
                            <option value="{{ $f->id }}">{{ $f->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="funcionario_id">Responsável:</label>
                        <select name="funcionario_id" id="funcionario_id" class="form-control custom-select"> 
                            <option>Selecione...</option>
                            @foreach($funcionarios as $func)
                            <option value="{{ $func->id }}">{{ $func->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" class="form-control" id="quantidade">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="data_entrada">Data de entrada:</label>
                        <input type="data" name="data_entrada" class="form-control" id="data_entrada" onkeypress="$(this).mask('00/00/0000')">
                    </div>            
                </div>
                <button class="btn btn-primary mt-3 float-right" style="width:130px;">Adicionar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-3 float-right mr-2" style="width:130px;">Voltar</a>
                <br><br>
            </form>          
        </div>
    </div>

@endsection