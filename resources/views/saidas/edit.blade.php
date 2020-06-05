@extends('layout')

@section('cabecalho')
Atualizar Saída
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/saidas">Tela principal</a></li>
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
            <form action="{{ route('saidas.update', $saidas->id, $saidas->produto_id, $saidas->funcionario_id) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="funcionario_id">Feito por:</label>
                        <select name="funcionario_id" id="funcionario_id" class="form-control custom-select"> 
                            <option value="{{ $saidas->funcionarios->id ?? '' }}">{{ $saidas->funcionarios->nome ?? 'Funcionario'}}
                                @foreach($funcionarios as $func)
                                <option value="{{ $func->id }}">{{ $func->nome }}</option>
                                @endforeach                    
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="produto_id">Produto:</label>
                        <select name="produto_id" id="produto_id" class="form-control custom-select"> 
                            <option value="{{ $saidas->produtos->id ?? '' }}">{{ $saidas->produtos->nome ?? 'Produto'}}
                                @foreach($produtos as $p)
                                <option value="{{ $p->id }}">{{ $p->nome }}</option>
                                @endforeach                    
                            </option>
                        </select>
                    </div>                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="valor">Valor do produto:</label>
                        <input type="number" name="valor" class="form-control" id="valor" step="0.01" min="0.01" value="{{ $saidas->valor }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" class="form-control" id="quantidade" value="{{ $saidas->quantidade }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="data_saida">Data de saída:</label>
                        <input type="data" name="data_saida" class="form-control" id="data_saida" onkeypress="$(this).mask('00/00/0000')" value="{{ $saidas->data_saida }}">
                    </div>            
                </div>
                <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       
            </form>          
        </div>
    </div>

@endsection