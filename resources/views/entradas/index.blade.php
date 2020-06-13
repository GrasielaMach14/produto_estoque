@extends('layout')

@section('cabecalho')
Entrada de Estoque
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li> <a href="/categorias">Categorias</a></li>
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
            <a href="entradas/criar" class="btn btn-info mb-2 float-right">Registrar entrada</a>
            @endauth
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr class="header">
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Data de entrada</th>
                        <th>Quantidade</th>
                        <th>Subtotal(R$):</th>
                        <th>Ação</th> 
                    </tr>
                </thead>
                @foreach($entradas as $entrada) 
                <tbody id="myTable">
                    <tr>
                        <td>{{ $entrada->id }}</td>
                        <td>{{ $entrada->produtos->nome }}</td>
                        <td>R$ {{ $entrada->produtos->preco }}</td>
                        <td>{{ $entrada->data_entrada }}</td>
                        <td>{{ $entrada->quantidade }}</td>
                        <td>                            
                            R$ {{ $entrada->produtos->preco * $entrada->quantidade }}
                        </td>
                        <td>
                            <span class="d-flex">
                                <a class="btn btn-success btn-sm mr-1" href="/entradas/{{ $entrada->id }}">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                                @auth
                                <a href="/entradas/{{ $entrada->id }}/edit" class="btn btn-info btn-sm mr-1">                    
                                    @csrf
                                    @method('PUT')
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endauth
                                @auth
                                <form method="post" action="/entradas/remover/{{ $entrada->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $entrada->nome )}}?')">
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
                {!! $entradas->links() !!}
            </div>    
        </div>
    </div>

@endsection