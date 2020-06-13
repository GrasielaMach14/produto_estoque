@extends('layout')

@section('cabecalho')
Saída de Estoque
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/categorias">Categorias</a></li>
    <li><a href="/produtos">Produtos</a></li>
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
            <a href="saidas/criar" class="btn btn-info mb-2 float-right">Registrar saída</a>
            @endauth
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr class="header">
                        <th>Id</th>
                        <th>Produto</th>
<!--                    <th>Valor bruto(R$)</th> -->
                        <th>Valor(R$)</th>
                        <th>Quantidade</th>
<!--                        <th>Feito por:</th> -->
                        <th>Data de saída</th>
                        <th>Subtotal(R$):</th>
                        <th>Ação</th> 
                    </tr>
                </thead>
                @foreach($saidas as $saida) 
                <tbody id="myTable">
                    <tr>
                        <td>{{ $saida->id }}</td>
                        <td>{{ $saida->produtos->nome }}</td>
        <!--            <td>R$ {{ $saida->produtos->preco }}</td> -->
                        <td>R$ {{ $saida->valor }}</td>
                        <td>{{ $saida->quantidade }}</td>
           <!--             <td>{{ $saida->funcionarios->nome }}</td> -->
                        <td>{{ $saida->data_saida }}</td>
                        <td>                            
                            R$ {{ $saida->valor * $saida->quantidade }}
                        </td>
                        <td>
                            <span class="d-flex">
                                <a class="btn btn-success btn-sm mr-1" href="/saidas/{{ $saida->id }}">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                                @auth
                                <a href="/saidas/{{ $saida->id }}/edit" class="btn btn-info btn-sm mr-1">                    
                                    @csrf
                                    @method('PUT')
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endauth
                                @auth
                                <form method="post" action="/saidas/remover/{{ $saida->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $saida->nome )}}?')">
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
                {!! $saidas->links() !!}
            </div>    
        </div>
    </div>

@endsection