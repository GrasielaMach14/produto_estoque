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
<div id="sidebar2"></div>
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
            <a href="/estoques/criar" class="btn btn-info mb-2 float-right">Registrar movimentação</a>
            @endauth 
            <table class="table table-hover" id="myTable">
                <h3>Estoque</h3>
                <thead class="thead-light">
                    <tr class="header">
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Valor(R$)</th>
                        <th>Entrada (unid)</th>
                        <th>Saída (unid)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach($estoques as $estoque) 
                <tbody id="myTable">
                    <tr>
                        <td>{{ $estoque->created_at }}</td>
                        <td>{{ $estoque->entrada->produtos->nome }}</td>
                        <td>R$ {{ $estoque->entrada->produtos->preco }}</td>
                        <td>{{ $estoque->entrada->quantidade }}</td>
                        <!--  <td>
                            {{ $estoque->tipo_movimentacao === 1 ? "Entrada" : "Saída" }}
                        </td> -->
                        <td>{{ $estoque->saida->quantidade }}</td>
                        <td>{{ $estoque->entrada->quantidade - $estoque->saida->quantidade }}</td>
                    </tr>
                    @endforeach        
                </tbody>           
            </table>        
        </div>
    </div>          
    <br>

    <div class="card">
        <div class="card-body table-responsive">
            @auth
            <a href="../entradas" class="btn btn-info mb-2 float-right">Lista de entradas</a>
            @endauth
            <table class="table table-hover" id="myTable">
                <h3>Entrada do estoque</h3>
                <thead class="thead-light">
                    <tr class="header">
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach($estoques as $estoque) 
                <tbody id="myTable">
                    <tr>
                        <td>{{ $estoque->entrada->data_entrada }}</td>
                        <td>{{ $estoque->entrada->produtos->nome }}</td>
                        <td>{{ $estoque->entrada->quantidade }}</td>
                        <td>R$ {{ $estoque->entrada->produtos->preco }}</td>
                        <td>R$ {{ $estoque->entrada->quantidade * $estoque->entrada->produtos->preco }}</td>
                      </tr>
                    @endforeach        
                </tbody>
            </table> 
        </div>
    </div> 
    <br>

    <div class="card">
        <div class="card-body table-responsive">
            @auth
            <a href="../saidas" class="btn btn-info mb-2 float-right">Lista de saidas</a>
            @endauth
            <table class="table table-hover" id="myTable">
                <h3>Saída de estoque</h3>
                <thead class="thead-light">
                    <tr class="header">
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach($estoques as $estoque) 
                <tbody>
                    <tr>
                        <td>{{ $estoque->saida->data_saida }}</td>
                        <td>{{ $estoque->saida->produtos->nome }}</td>
                        <td>{{ $estoque->saida->quantidade }}</td>
                        <td>R$ {{ $estoque->saida->produtos->preco }}</td>
                        <td>R$ {{ $estoque->saida->quantidade * $estoque->saida->produtos->preco }}</td>
                        </tr>
                    @endforeach        
                </tbody>           
            </table>                  
        </div>
    </div>          
    <br>

@endsection