@extends('layout')

@section('cabecalho')
Atualizar Movimentação
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
            <form action="{{ route('estoques.update', $estoques->id, $estoques->produto_id, $estoques->fornecedor_id, $estoques->funcionario_id) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label for="tipo_movimentacao">Tipo de movimentação:</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_movimentacao" id="tipo_movimentacao" value="option" checked>
                        <label class="form-check-label" for="tipo_movimentacao">
                            Entrada
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_movimentacao" id="tipo_movimentacao" value="option">
                        <label class="form-check-label" for="tipo_movimentacao">
                            Saída
                        </label>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="produto_id">Produto:</label>
                        <select name="produto_id" id="produto_id" class="form-control custom-select"> 
                            <option value="{{ $estoques->produtos->id ?? '' }}">{{ $estoques->produtos->nome ?? 'Produto'}}
                                @foreach($produtos as $p)
                                <option value="{{ $p->id }}">{{ $p->nome }}</option>
                                @endforeach                    
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fornecedor_id">Fornecedor:</label>
                        <select name="fornecedor_id" id="fornecedor_id" class="form-control custom-select"> 
                        <option value="{{ $estoques->fornecedores->id ?? '' }}">{{ $estoques->fornecedores->nome ?? 'Fornecedor'}}
                                @foreach($fornecedores as $f)
                                <option value="{{ $f->id }}">{{ $f->nome }}</option>
                                @endforeach                    
                           </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="funcionario_id">Feito por:</label>
                        <select name="funcionario_id" id="funcionario_id" class="form-control custom-select"> 
                        <option value="{{ $estoques->funcionarios->id ?? '' }}">{{ $estoques->funcionarios->nome ?? 'Funcionario'}}
                                @foreach($funcionarios as $func)
                                <option value="{{ $func->id }}">{{ $func->nome }}</option>
                                @endforeach                    
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" class="form-control" id="quantidade" value="{{ $estoques->quantidade }}">
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="valor_total">Valor total:</label>
                        <input type="number" name="valor_total" class="form-control" id="valor_total" value="{{ $estoques->valor_total }}">
                    </div>
                </div>
                <br><br>
                <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       <br><br><br><br>
            </form>          
        </div>
    </div>

@endsection