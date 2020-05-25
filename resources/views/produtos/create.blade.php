@extends('layout')

@section('cabecalho')
Adicionar Produtos
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
    <form method="post">
    @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo">
            </div>
            <div class="form-group col-md-4">
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-control custom-select"> 
                    <option>Selecione...</option>
                    @foreach($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" class="form-control" id="preco">
            </div>
            <div class="form-group col-md-4">
                <label for="valor_final">Preço Final:</label>
                <input type="number" name="valor_final" class="form-control" id="valor_final"> 
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" id="quantidade">
            </div>
        </div>
            <button class="btn btn-primary mt-5 float-right" style="width:130px;">Adicionar</button>
            <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2" style="width:130px;">Voltar</a>
            <br><br><br><br><br><br>
    </form>

@endsection