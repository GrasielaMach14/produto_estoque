@extends('layout')

@section('cabecalho')
Adicionar Categorias
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
        <div class="row">
            <div class="col col-10">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome">
            </div>
        </div>
        <button class="btn btn-primary mt-2 float-right">Adicionar</button>
        <a href="JavaScript: window.history.back();" class="btn btn-primary mt-2 float-right mr-2">Voltar</a>
    </form>

@endsection