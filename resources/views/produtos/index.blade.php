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
</ul>
@endsection

@section('conteudo')

<div class="col-md-12 mb-4" style="float:left;margin-top:-20px;">
    
</div>
@if(!empty($mensagem))
    <div class="alert alert-sucess">
        {{ $mensagem }}
    </div>
@endif
    <input type="text" id="txtBuscar" placeholder="Search for names.." title="Type in a name">
    @auth
    <a href="produtos/criar" class="btn btn-info mb-2 float-right">Incluir</a>
    @endauth
    <table class="table table-striped table-hover" id="myTable">
        <thead class="thead-dark">
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
        <tbody id="tbody">
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

    <!--<script>
            var tbody = document.getElementById("tbody");
            var tr = tbody.childNodes;
            
            document.getElementById("txtBuscar").addEventListener("keyup", function(){
                var busca = document.getElementById("txtBuscar").value.toLowerCase();
                
                for (var i = 0; i < tbody.childNodes.length; i++)
                {
                    var find = false;
                    var tr = tbody.childNodes[i];
                    
                    var td = tr.childNodes;

                    for (var j = 0; j = td.length; j++)
                    {
                        var value = td[j].childNodes[0].nodeValue.toLowerCase();

                        if(value.indexOf(busca) >= 0)
                        {
                            find = true;
                        }
                    }

                    if(find)
                    {
                       // tr.style.display = "table-row";
                    }else{
                        tr.style.display = "none";
                    }
                }
            });
    </script> -->
@endsection