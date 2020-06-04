@extends('layout')

@section('cabecalho')
Movimentação da entrada
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
    <h5>Criado em: {{$entradas->created_at}}</h5>
    <h5>Modificado em: {{$entradas->updated_at}}</h5>
</div>

@endsection