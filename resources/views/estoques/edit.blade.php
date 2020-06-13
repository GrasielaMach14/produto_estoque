@extends('layout')

@section('cabecalho')
Atualizar Movimentação
@endsection

@section('sidebar')
<ul>
    <li></li>
    <li><a href="#">    </a></li>
    <li><a href="/estoques">Tela principal</a></li>
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
            <form action="{{ route('estoques.update', $estoques->id, $estoques->produto_id, $estoques->entrada_id, $estoques->saida_id) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="entrada_id">Altere registro da entrada pelo produto:</label>
                        <select name="entrada_id" id="entrada_id" class="form-control custom-select"> 
                        <option value="{{ $estoques->entrada->id ?? '' }}">{{ $estoques->entrada->nome ?? 'Entrada'}}
                                @foreach($entradas as $entra)
                                <option value="{{ $entra->id }}">{{ $entra->produtos->nome }}</option>
                                @endforeach                    
                           </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="saida_id">Altere registro da saída pelo produto:</label>
                        <select name="saida_id" id="saida_id" class="form-control custom-select"> 
                        <option value="{{ $estoques->saida->id ?? '' }}">{{ $estoques->saida->nome ?? 'Saida'}}
                                @foreach($saidas as $sai)
                                <option value="{{ $sai->id }}">{{ $sai->produtos->nome }}</option>
                                @endforeach                    
                           </option>
                        </select>
                    </div>
                </div>
                <br><br>
                <button class="btn btn-primary float-right" style="width:130px;">Alterar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-primary float-right mr-2" style="width:130px;">Voltar</a>       
            </form>          
        </div>
    </div>

@endsection