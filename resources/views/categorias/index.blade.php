@extends('layout')

@section('cabecalho')
Categorias de Produtos
@endsection

@section('conteudo')
@if(!empty($mensagem))
    <div class="alert alert-sucess">
        {{ $mensagem }}
    </div>
@endif
    @auth
    <a href="categorias/criar" class="btn btn-info mb-2 float-right">Incluir</a>
    @endauth
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col" class="float:right;">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)            
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>
                    <span class="d-flex">
                        @auth
                        <a href="/categorias/{{ $categoria->id }}" class="btn btn-info btn-sm mr-1">                    
                            @csrf
                            @method('PUT')
                            <i class="fas fa-edit"></i>
                        </a>
                        @endauth
                        @auth
                        <form method="post" action="/categorias/remover/{{ $categoria->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $categoria->nome )}}?')">
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
        </tbody>
    </table>
    <div style="float:right;">
        {!! $categorias->links() !!}
    </div>    
@endsection