@extends('layout')

@section('cabecalho')
Atualizar Fornecedor
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
    <form action="{{ route('fornecedores.update', $fornecedores->id) }}" method="post">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $fornecedores->nome }}">
        </div>
        <div class="form-group">
            <label for="cnpj">Cnpj</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $fornecedores->cnpj }}">
        </div>
        <br><br>
        <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
        <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       <br><br><br><br>
    </form>

@endsection