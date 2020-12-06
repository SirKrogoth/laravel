@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')        
<a href="series/criar" class="btn btn-dark">Adicionar</a>

<br />
<br />

<ul class="list-group">
    <?php foreach($series as $serie) : ?>
        <li class="list-group-item"><?= $serie->nome; ?></li>
    <?php endforeach; ?>
</ul>
@endsection