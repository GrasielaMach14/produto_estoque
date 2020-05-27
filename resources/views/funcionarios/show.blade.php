@extends('layout')

@section('cabecalho')
Funcionário
@endsection

@section('conteudo')
<div class="float-left">
    @php 
        $setor = $funcionarios->find($funcionarios->id)->setor;
    @endphp
    <h1>Nome: {{ $funcionarios->nome }}</h1> <hr>
    <h3>Matrícula: {{ $funcionarios->matricula }}</h3> 
    <h3>Setor: {{ $setor->nome }}</h3> 
</div>

@endsection