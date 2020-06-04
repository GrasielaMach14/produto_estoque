@extends('layout')

@section('cabecalho')
Setor
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#"> </a></li>
    <li> <a href="/produtos">Produtos</a></li>
    <li><a href="/categorias">Categoria</a></li>
    <li><a href="/estoques">Estoque</a></li>
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

<div class="wrapper mb-2 " >
    <div class="search-box">
        <input type="text" class="input" id="myInput" onkeyup="searchFunc()" placeholder="Filtrar buscas por nome...">
        <div class="searchbtn">
            <i class="fas fa-search"></i>
        </div>
    </div>
</div>

<br><br>

    <div class="card">
        <div class="card-body">
            @auth
            <a href="setores/criar" class="btn btn-info mb-2 float-right">Incluir</a>
            @endauth
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                @foreach($setores as $setor)
                <tbody id="myTable">
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
                </tbody>
                @endforeach
            </table>
            <div style="float:right;">
                {!! $setores->links() !!}
            </div>           
        </div>
    </div>
@endsection