@extends('layout')

@section('cabecalho')
Estoque
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li> <a href="/categorias">Categorias</a></li>
    <li><a href="/produtos">Produtos</a></li>
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
        <div class="card-body">
            <a href="#" class="btn btn-info mb-2 float-right">Lista de saídas</a>
            <a href="/entradas" class="btn btn-info mb-2 float-right mr-2">Lista de entradas</a>
            @auth
            <a href="estoques/criar" class="btn btn-success mb-2 float-right mr-2">Registrar movimentação</a>
            @endauth
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr class="header">
                        <th>Produto</th>
                        <th>Valor do produto</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                @foreach($estoques as $estoque) 
                <tbody id="myTable">
                    <tr>
                        <td>{{ $estoque->produtos->nome }}</td>
                        <td>R$ {{ $estoque->produtos->preco }}</td>
                        <td>{{ $estoque->entrada->quantidade }}</td>
                      <!--  <td>
                            {{ $estoque->tipo_movimentacao === 1 ? "Entrada" : "Saída" }}
                        </td> -->
                        <td>{{ $estoque->saida->quantidade }}</td>
                        <td>
                            <span class="d-flex">
                                <a class="btn btn-info btn-sm mr-1" href="/estoques/{{ $estoque->id }}">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                                @auth
                                <a href="/estoques/{{ $estoque->id }}/edit" class="btn btn-info btn-sm mr-1">                    
                                    @csrf
                                    @method('PUT')
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endauth
                                @auth
                                <form method="post" action="/estoques/remover/{{ $estoque->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $estoque->nome )}}?')">
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
                {!! $estoques->links() !!}
            </div>           
        </div>
    </div>

@endsection