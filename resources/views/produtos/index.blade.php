@extends('layout')

@section('cabecalho')
Produtos
@endsection

@section('conteudo')
@if(!empty($mensagem))
    <div class="alert alert-sucess">
        {{ $mensagem }}
    </div>
@endif
    @auth
    <a href="produtos/criar" class="btn btn-info mb-2 float-right">Incluir</a>
    @endauth
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        @foreach($produtos as $produto)            
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>{{ $produto->categoria->nome }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>
                <span class="d-flex">
                    @auth
                    <a href="/produtos/{{ $produto->id }}" class="btn btn-info btn-sm mr-1">                    
                        @csrf
                        @method('PUT')
                        <i class="fas fa-edit"></i>
                    </a>
                    @endauth
                    @auth
                    <form method="post" action="/produtos/remover/{{ $produto->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $produto->nome )}}?')">
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
    
@endsection