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

<a href="setores/criar" class="btn btn-info mb-2 float-right">Incluir</a>
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
                    @auth
                    <a href="/setores/{{ $setor->id }}" class="btn btn-info btn-sm mr-1">                    
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