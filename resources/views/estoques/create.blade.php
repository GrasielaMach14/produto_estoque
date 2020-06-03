@extends('layout')

@section('cabecalho')
Adicionar Movimentação
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/estoques">Tela principal</a></li>
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
                    <label for="tipo_movimentacao">Tipo de movimentação:</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_movimentacao" id="tipo_movimentacao" value="1" checked>
                        <label class="form-check-label" for="tipo_movimentacao">
                            Entrada
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_movimentacao" id="tipo_movimentacao" value="0">
                        <label class="form-check-label" for="tipo_movimentacao">
                            Saída
                        </label>
                    </div>
                </div>
                <div class="form-row mt-4">
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
                    <div class="form-group col-md-6">
                        <label for="funcionario_id">Feito por:</label>
                        <select name="funcionario_id" id="funcionario_id" class="form-control custom-select"> 
                            <option>Selecione...</option>
                            @foreach($funcionarios as $func)
                            <option value="{{ $func->id }}">{{ $func->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" class="form-control" id="quantidade">
                    </div>            
                </div>
                    <div class="col-md-4">
                        <label for="valor_total">Valor total:</label>
                        <input type="number" name="valor_total" id="valor_total" step="0.01" min="0.01">
                    </div>
                <div class="form-group">
                </div>            
                <button class="btn btn-primary mt-3 float-right" style="width:130px;">Adicionar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-3 float-right mr-2" style="width:130px;">Voltar</a>
                <br><br><br>
            </form>          
        </div>
    </div>

@endsection