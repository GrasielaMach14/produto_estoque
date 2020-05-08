@extends('layout')

@section('cabecalho')
Atualizar Produto
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
    <form action="{{ route('categorias.update', $categorias->id) }}" method="post">
        {{ method_field('PUT') }}
        @csrf
        <div class="row">
            <div class="col col-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $categorias->nome }}">
            </div>
        </div>
        <button class="btn btn-primary mt-2 float-right">Alterar</button>
        <a href="JavaScript: window.history.back();" class="btn btn-primary mt-2 float-right mr-2">Voltar</a>
    </form>

@endsection