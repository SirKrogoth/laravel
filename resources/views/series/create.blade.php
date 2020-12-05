@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection

@section('conteudo')
<form method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome">   
    </div>

    <br />
    <br />
            
    <button href="#" class="btn btn-primary">Criar</button>
</form>
@endsection