<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $series = [
            'Greys Anathomy',
            'Lost',
            'Agents of SHIELD'
        ];
    
    
        return view('series.index', ['series' => $series]);
    }
    
    public function create(){

        return view('series.create');

    }
}