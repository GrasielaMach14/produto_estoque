@extends('layout')

@section('cabecalho')
Atualizar Entrada
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/entradas">Tela principal</a></li>
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
            <form action="{{ route('entradas.update', $entradas->id, $entradas->produto_id, $entradas->fornecedor_id, $entradas->funcionario_id) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="produto_id">Produto:</label>
                        <select name="produto_id" id="produto_id" class="form-control custom-select"> 
                            <option value="{{ $entradas->produtos->id ?? '' }}">{{ $entradas->produtos->nome ?? 'Produto'}}
                                @foreach($produtos as $p)
                                <option value="{{ $p->id }}">{{ $p->nome }}</option>
                                @endforeach                    
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fornecedor_id">Fornecedor:</label>
                        <select name="fornecedor_id" id="fornecedor_id" class="form-control custom-select"> 
                            <option value="{{ $entradas->fornecedores->id ?? '' }}">{{ $entradas->fornecedores->nome ?? 'Fornecedor'}}
                                @foreach($fornecedores as $f)
                                <option value="{{ $f->id }}">{{ $f->nome }}</option>
                                @endforeach                    
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="funcionario_id">Feito por:</label>
                        <select name="funcionario_id" id="funcionario_id" class="form-control custom-select"> 
                            <option value="{{ $entradas->funcionarios->id ?? '' }}">{{ $entradas->funcionarios->nome ?? 'Funcionario'}}
                                @foreach($funcionarios as $func)
                                <option value="{{ $func->id }}">{{ $func->nome }}</option>
                                @endforeach                    
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" class="form-control" id="quantidade" value="{{ $entradas->quantidade }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="data_entrada">Data de entrada:</label>
                        <input type="data" name="data_entrada" class="form-control" id="data_entrada" onkeypress="$(this).mask('00/00/0000')" value="{{ $entradas->data_entrada }}">
                    </div>            
                </div>
                <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       
            </form>          
        </div>
    </div>

@endsection