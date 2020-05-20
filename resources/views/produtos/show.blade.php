@extends('layout')

@section('cabecalho')
Produtos
@endsection

@section('conteudo')
<div class="float-left">
    @php 
        $categoria = $produtos->find($produtos->id)->categoria;
    @endphp
    <h1>Nome: {{ $produtos->nome }}</h1> <hr>
    <h3>Descrição: {{ $produtos->descricao }}</h3> 
    <h3>Preço: {{ $produtos->valor_final }}</h3> 
    <h3>categoria: {{ $categoria->nome }}</h3> 
</div>

@endsection