<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BuscaController extends Controller
{
    //

    public function index(){
        
        return view('busca.index');
    }
}
