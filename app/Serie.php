<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        //Uma Série tem muitas temporadas
        return $this->hasMany(Temporada::class);
    }
}
