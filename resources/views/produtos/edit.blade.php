@extends('layout')

@section('cabecalho')
Atualizar Produto
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/produtos">Tela principal</a></li>
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
    <form action="{{ route('produtos.update', $produtos->id, $produtos->categoria_id) }}" method="post">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $produtos->nome }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $produtos->descricao }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" class="form-control" id="modelo" value="{{ $produtos->modelo }}">
            </div>
            <div class="form-group col-md-4">
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-control custom-select">
                    <option value="{{ $produtos->categoria->id ?? '' }}">{{ $produtos->categoria->nome ?? 'Categoria'}}
                        @foreach($categorias as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach                    
                    </option>
                </select>                
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="preco">Preço</label>
                <input type="number" name="preco" class="form-control" id="preco" value="{{ $produtos->preco }}">
            </div>
            <div class="form-group col-md-4">
                <label for="valor_final">Preço final</label>
                <input type="number" name="valor_final" class="form-control" id="valor_final" value="{{ $produtos->valor_final }}">
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" id="quantidade" value="{{ $produtos->quantidade }}">
            </div>
        </div>
        <br><br>
        <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
        <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       <br><br><br><br>
    </form>

@endsection