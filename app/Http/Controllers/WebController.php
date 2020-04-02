<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function index(){
        return view('index.index');
    }

    public function login(){
        return view('auth.login');
    }

    public function profile(){
        return view('profile.index');
    }

    public function header(){
        return  response()->json(['success' => true, 'html' => view('layout.header')->render()]) ;
    }
}
