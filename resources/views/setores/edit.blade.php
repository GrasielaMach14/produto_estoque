@extends('layout')

@section('cabecalho')
Atualizar Setor
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/setores">Tela principal</a></li>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('setores.update', $setores->id) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $setores->nome }}">
                </div>
                <br><br>
                <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       <br><br><br><br>        
            </form>          
        </div>
    </div>

@endsection