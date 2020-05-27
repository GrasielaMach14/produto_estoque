@extends('layout')

@section('cabecalho')
Categorias de Produtos
@endsection

@section('conteudo')
<div class="float-left">
    <h1>Visualizar</h1> <hr>
    <h4>ID: {{ $categorias->id }}</h4> 
    <h3>Categoria: {{ $categorias->nome }}</h3> 
</div>

@endsection