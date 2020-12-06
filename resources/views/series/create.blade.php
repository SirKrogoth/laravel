@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection

@section('conteudo')
<form method="post">
    @csrf<!-- Isso aqui é um hash de segurança do Laravel, isso previne ataques onde o atacante pode tentar se passar pelo usuário. Neste caso o Laravel manda um hash, que se nao for respondido, será recusado -->
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome">   
    </div>

    <br />
    <br />
            
    <button href="#" class="btn btn-primary">Criar</button>
</form>
@endsection