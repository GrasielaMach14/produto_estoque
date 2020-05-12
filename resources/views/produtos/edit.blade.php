@extends('layout')

@section('cabecalho')
Atualizar Produto
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
        <div class="row">
            <div class="col col-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $produtos->nome }}">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" value="{{ $produtos->descricao }}"> 
            </div>
            <div class="col col-2">
            <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="form-control" value="{{ $produtos->categoria_id }}">
                <option>Selecione...</option>
                @foreach($categorias as $c)
                <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" class="form-control" id="preco" value="{{ $produtos->preco }}">
            </div>
        </div>
        <div style="margin-right: 35%;">
            <button class="btn btn-primary mt-5 float-right">Alterar</button>
            <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2">Voltar</a>
        </div>
    </form>

@endsection