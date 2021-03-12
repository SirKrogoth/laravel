<?php

namespace App\Services;
use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class RemovedorDeSeries
{
    public function RemoverSerie(int $serieId) : string
    {
        $nomeSerie = '';
        //Preciso dizer para a transação quais variaveis externas vou utilizar
        //Quando manipularmos dentro da transação uma variavel externa, deverá passar por referencia
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->RemoverTemporadas($serie);
            $serie->delete();
        });

        return $nomeSerie;
    }

    private function RemoverTemporadas(Serie $serie) : void
    {
        $serie->temporadas->each(function (Temporada $temporada){
            $this->RemoverEpisodiosTemporada($temporada);
            $temporada->delete();
        });


    }

    private function RemoverEpisodiosTemporada(Temporada $temporada) : void
    {
        $temporada->episodios->each(function (Episodio $episodio){
            $episodio->delete();
        });
    }

}