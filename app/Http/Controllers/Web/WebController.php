<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function header(){
        return  response()->json(['success' => true, 'html' => view('layout.header')->render()]) ;
    }

    public function index(){
        return view('index.index');
    }

    public function login(){
        return view('auth.login');
    }
}
