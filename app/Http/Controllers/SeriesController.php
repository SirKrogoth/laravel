<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Episodio;
use App\Temporada;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Services\{CriadorDeSeries, RemovedorDeSeries};



class SeriesController extends Controller
{
    //Assim será todas as rotas autenticadas 
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}

    public function index(Request $request) 
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSerie)
    {
        $serie = $criadorDeSerie->CriarSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} criada com sucesso {$serie->nome}."
            );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSeries $removedorDeSeries)
    {
        $nomeSerie = $removedorDeSeries->RemoverSerie($request->id);
        
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
