@extends('layout')

@section('cabecalho')
Movimentação da Saída
@endsection

@section('conteudo')
<div class="float-left">
    @php 
        $produtos = $saidas->find($saidas->id)->produtos;
        $funcionarios = $saidas->find($saidas->id)->funcionarios;
    @endphp
    <h1>Produto: {{ $produtos->nome }}</h1> <hr>
    <h3>Valor do produto: R$ {{ $produtos->preco }}</h3> 
    <h3>Quantidade: {{ $saidas->quantidade }} unidades</h3> 
    <h3>Feito por: {{ $funcionarios->nome }}</h3> 
    <br>
    <h6>Modificado em: {{$saidas->updated_at}}</h6>
</div>

@endsection