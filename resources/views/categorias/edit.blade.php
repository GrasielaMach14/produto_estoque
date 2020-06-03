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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categorias.update', $categorias->id) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{ $categorias->nome }}">
                </div>
                <button class="btn btn-primary mt-5 float-right" style="width:130px;">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary mt-5 float-right mr-2" style="width:130px;">Voltar</a>
            </form>          
        </div>
    </div>

@endsection