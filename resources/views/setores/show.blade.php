@extends('layout')

@section('cabecalho')
Setor
@endsection

@section('conteudo')
<div class="float-left">
    <h3>Id: {{ $setores->id}}</h3>
    <h1>{{ $setores->nome }}</h1> <hr>    
</div>

@endsection