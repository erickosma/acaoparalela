<?php

namespace App\Http\Controllers;



use App\Repositories\Contracts\UserRepositoryInterface;

class ProfileController extends Controller
{

    /**
     * @var $user UserRepositoryInterface
     */
    protected $user;

    public function __construct(UserRepositoryInterface  $user)
    {

    }

    public function index(){
        return view('profile.index');
    }

    public function personal(){

    }

    public function message(){

    }

    public function profileOng(){
        return view('profile.ong');
    }

    public function profileVoluntarie(){
        return view('profile.voluntary');
    }

}
