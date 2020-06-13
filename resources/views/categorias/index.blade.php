@extends('layout')

@section('cabecalho')
Categorias 
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#"> </a></li>
    <li> <a href="/produtos">Produtos</a></li>
    <li><a href="/estoques">Estoque</a></li>
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
    <div class="card">
        <div class="card-body table-responsive">
            @auth
            <a href="categorias/criar" class="btn btn-info mb-2 float-right">Incluir</a>
            @endauth
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                @foreach($categorias as $categoria)            
                <tbody id="myTable">
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nome }}</td>
                        <td>
                            <span class="d-flex">
                                <a class="btn btn-success btn-sm mr-1" href="/categorias/{{ $categoria->id }}">
                                <i class="fas fa-search-plus"></i>
                                </a>
                                @auth
                                <a href="/categorias/{{ $categoria->id }}/edit" class="btn btn-info btn-sm mr-1">                    
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
        </div>
    </div>
@endsection