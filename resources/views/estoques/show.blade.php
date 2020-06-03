@extends('layout')

@section('cabecalho')
Estoques
@endsection

@section('conteudo')
<div class="float-left">
    @php 
        $produtos = $estoques->find($estoques->id)->produtos;
        $fornecedores = $estoques->find($estoques->id)->fornecedores;
        $funcionarios = $estoques->find($estoques->id)->funcionarios;
    @endphp
    <h1>Produto: {{ $produtos->nome }}</h1> <hr>
    <h1>Valor real: R$ {{ $produtos->preco }}</h1> 
    <h3>Quantidade: {{ $estoques->quantidade }}</h3> 
    <h3>Tipo: {{ $estoques->tipo_movimentacao === 1 ? "Entrada" : "Saída" }}</h3> 
    <h3>Valor total: R$ {{ $estoques->valor_total }}</h3> 
    <h3>Feito por: {{ $funcionarios->nome }}</h3> 
</div>

@endsection