<?php

namespace App\Http\Controllers;



use App\Repositories\Contracts\UserRepositoryInterface;

class ProfileController extends Controller
{

    /**
     * @var $user UserRepositoryInterface
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface  $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        return view('profile.index');
    }

    public function profileOng(){
        return view('profile.ong');
    }

    public function profileVoluntarie(){
        return view('profile.voluntary');
    }

    public function personal(){

    }

    public function message(){

    }

}
