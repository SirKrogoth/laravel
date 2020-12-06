<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //protected $table = 'series'; Laravel considera o nome da classe no plural e minuscula como nome da tabela
    public $timestamps = false; //Laravel cria dois campos automaticamente, data de ultima atualizacao e data de criacao. No caso estamos setando para false./
    protected $fillable = ['nome'];
}