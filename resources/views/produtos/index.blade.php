@extends('layout')

@section('cabecalho')
Produtos
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li> <a href="/categorias">Categorias</a></li>
    <li><a href="/produtos/home">Estoque</a></li>
    <li><a href="/setores">Setor</a></li>
    <li><a href="/funcionarios">Funcionário</a></li>
    <li><a href="/fornecedores">Fornecedores</a></li>
</ul>
@endsection

@section('conteudo')
@if(!empty($mensagem))
    <div class="alert alert-sucess mt-3">
        {{ $mensagem }}
    </div>
@endif
    <div class="wrapper" >
        <div class="search-box">
            <input type="text" class="input" id="myInput" onkeyup="searchFunc()" placeholder="Filtrar buscas por nome...">
            <div class="searchbtn">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>

    <br><br>

    @auth
    <a href="produtos/criar" class="btn btn-info mb-2 float-right">Incluir</a>
    @endauth
    <table class="table table-hover">
        <thead class="thead-light">
            <tr class="header">
                <th>Id</th>
                <th>Nome</th>
                <th>Modelo</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        @foreach($produtos as $produto) 
        <tbody id="myTable">
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->modelo }}</td>
                <td>{{ $produto->descricao }}</td>
                <td>{{ $produto->categoria->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>
                    <span class="d-flex">
                        <a class="btn btn-success btn-sm mr-1" href="/produtos/{{ $produto->id }}">
                            <i class="fas fa-search-plus"></i>
                        </a>
                        @auth
                        <a href="/produtos/{{ $produto->id }}/edit" class="btn btn-info btn-sm mr-1">                    
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
        </tbody>           
    </table>


    <div style="float:right;">
        {!! $produtos->links() !!}
    </div> 

@endsection