@extends('layout')

@section('cabecalho')
Setor
@endsection

@section('conteudo')
<div class="float-left">
    <h1>Nome: {{ $setores->nome }}</h1> <hr>    
</div>

@endsection