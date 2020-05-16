@extends('layout')

@section('cabecalho')
Colaboradores
@endsection

@section('conteudo')
<a href="funcionarios/criar" class="btn btn-info mb-2 float-right">Incluir</a>
<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Setor</th>
            <th>Ação</th>
        </tr>
    </thead>
    @foreach($funcionarios as $funcionario)
    <tr>
        <td>{{ $funcionario->id }}</td>
        <td>{{ $funcionario->nome }}</td>
        <td>{{ $funcionario->cpf }}</td>
        <td>{{ $funcionario->setor->nome }}</td>
        <td>
            <span class="d-flex">
                @auth
                <a href="/funcionarios/{{ $funcionario->id }}" class="btn btn-info btn-sm mr-1">                    
                    @csrf
                    @method('PUT')
                    <i class="fas fa-edit"></i>
                </a>
                @endauth
                @auth
                <form method="post" action="/funcionarios/remover/{{ $funcionario->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $funcionario->nome )}}?')">
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
    {!! $funcionarios->links() !!}
</div>    
@endsection
