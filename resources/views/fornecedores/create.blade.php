@extends('layout')

@section('cabecalho')
Adicionar Produtos
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/fornecedores">Tela principal</a></li>
</ul>
@endsection

@section('conteudo')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
    @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" name="cnpj" placeholder="00.000.000/0000-00" onkeypress="$(this).mask('00.000.000/0000-00')">
        </div>
        <button class="btn btn-primary mt-5 float-right" style="width:130px;">Adicionar</button>
        <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2" style="width:130px;">Voltar</a>
        <br><br><br><br><br><br>
    </form>

@endsection