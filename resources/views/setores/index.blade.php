@extends('layout')

@section('cabecalho')
Setor
@endsection

@section('conteudo')
@if(!empty($mensagem))
    <div class="alert alert-sucess">
        {{ $mensagem }}
    </div>
@endif
@auth
<a href="setores/criar" class="btn btn-info mb-2 float-right">Incluir</a>
@endauth
<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Ação</th>
        </tr>
    </thead>
    @foreach($setores as $setor)
    <tr>
        <td>{{ $setor->id }}</td>
        <td>{{ $setor->nome }}</td>
        <td>
            <span class="d-flex">
                    <a class="btn btn-success btn-sm mr-1" href="/setores/{{ $setor->id }}">
                        <i class="fas fa-search-plus"></i>
                    </a>
                    @auth
                    <a href="/setores/{{ $setor->id }}/edit" class="btn btn-info btn-sm mr-1">                    
                        @csrf
                        @method('PUT')
                        <i class="fas fa-edit"></i>
                    </a>
                    @endauth
                    @auth
                    <form method="post" action="/setores/remover/{{ $setor->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $setor->nome )}}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    @endauth
            </span>
        </td>
    </tr>
    @endforeach
</table>
<div style="float:right;">
    {!! $setores->links() !!}
</div> 
@endsection