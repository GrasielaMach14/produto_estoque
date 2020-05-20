@extends('layout')

@section('cabecalho')
Adicionar Produtos
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
    <form method="post">
    @csrf
        <div class="row">
            <div class="col col-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo">
            </div>
            <div class="col col-2">
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                    <option>Selecione...</option>
                    @foreach($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" class="form-control" id="preco">
                <label for="valor_final">Preço Final:</label>
                <input type="number" name="valor_final" class="form-control" id="valor_final">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" id="quantidade">
            </div>
            <div style="margin-right:35%;">
                <button class="btn btn-primary mt-5 float-right">Adicionar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2">Voltar</a>
            </div>
        </div>
    </form>

@endsection