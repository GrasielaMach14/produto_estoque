@extends('layout')

@section('cabecalho')
Movimentação da Entrada
@endsection

@section('conteudo')
<div class="float-left">
    @php 
        $produtos = $entradas->find($entradas->id)->produtos;
        $fornecedores = $entradas->find($entradas->id)->fornecedores;
        $funcionarios = $entradas->find($entradas->id)->funcionarios;
    @endphp
    <h1>Produto: {{ $produtos->nome }}</h1> <hr>
    <h3>Valor do produto: R$ {{ $produtos->preco }}</h3> 
    <h3>Fornecedor: {{ $fornecedores->nome }}</h3> 
    <h3>Quantidade: {{ $entradas->quantidade }} unidades</h3> 
    <h3>Feito por: {{ $funcionarios->nome }}</h3> 
    <br>
    <h6>Modificado em: {{$entradas->updated_at}}</h6>
</div>

@endsection