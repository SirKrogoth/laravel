<?php

namespace App\Services;
use App\{Serie, Temporada};
use Illuminate\Support\Facades\DB;

class CriadorDeSeries
{
    // : Serie -> Significa que o método retorna uma série
    public function CriarSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada) : Serie
    {
        //$serie = Serie::create($request->all());
        $serie = null;

        DB::transaction(function () use (&$serie, &$nomeSerie, $qtdTemporadas, $epPorTemporada) {

            $serie = Serie::create(['nome' => $nomeSerie]);

            for($i = 1; $i <= $qtdTemporadas; $i++)
            {
                $temportada = $serie->temporadas()->create(['numero' => $i]);
    
                $this->CriarEpisodios($epPorTemporada, $temportada);
            } 
        });        

        return $serie;
    }

    public function CriarEpisodios(int $epPorTemporada, Temporada $temportada) : void
    {
        for($j = 1; $j <= $epPorTemporada; $j++)
        {
            $temportada->episodios()->create(['numero' => $j]);
        }
    }


}