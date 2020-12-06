<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {

        $series = Serie::all();
    
    
        return view('series.index', ['series' => $series]);
    }
    
    public function create()
    {

        return view('series.create');

    }

    public function store(Request $request)
    {
        //possibilidade 01
        //$nome = $request->nome;
        //$serie = new Serie();

        //$serie->nome = $nome;
        //$serie->save();

        //possibilidade 02
        //Irá pegar todos os dados do request, e colocar na serie
        //$serie = Serie::create($request->all());

        //possibilidade 03
        $serie = Serie::create([
            'nome' => $request->nome
        ]);

        return redirect()->action([SeriesController::class, 'index']);
    }
}