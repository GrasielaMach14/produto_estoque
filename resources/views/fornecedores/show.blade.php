@extends('layout')

@section('cabecalho')
Fornecedores
@endsection

@section('conteudo')
<div class="float-left">
    <h1>Nome: {{ $fornecedores->nome }}</h1> <hr>
    <h3>CNPJ: {{ $fornecedores->cnpj }}</h3> 
</div>

@endsection