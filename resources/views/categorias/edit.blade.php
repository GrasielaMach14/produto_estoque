@extends('layout')

@section('cabecalho')
Atualizar Categoria
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
            <div class="col col-10">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $categorias->nome }}">
            </div>
            <div style="margin-left:68%;">
                <button class="btn btn-primary mt-5 float-right">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2">Voltar</a>
            </div>
        </div>
    </form>

@endsection