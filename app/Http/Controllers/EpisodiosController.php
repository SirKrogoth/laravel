<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Temporada, Episodio};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        //$episodios = $temporada->episodios;

        //return view('episodios.index', compact('episodios'));
        //Outra forma sem usar o compact
        return view('episodios.index', [
            'episodios' => $temporada->episodios,
            'temporadaId' => $temporada->id,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }
    
    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos){
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        //SIstema irá salvar tudo no banco de dados
        $temporada->push();

        $request->session()->flash('mensagem', 'Episódios marcados com sucessos.');

        return redirect()->back();
    }
}