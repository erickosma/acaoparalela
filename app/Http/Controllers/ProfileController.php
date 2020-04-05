<?php

namespace App\Http\Controllers;



use App\Enums\UserType;
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
        $id =  auth()->user()->id;
        $userType = $this->userRepository->userType($id);
        if ($userType == UserType::VOLUNTARY){
            return redirect()->action('ProfileController@profileOng');
        }
        else if ($userType == UserType::ONG){
            return redirect()->action('ProfileController@profileVoluntary');
        }
        return view('profile.index');
    }

    public function profileOng(){
        return view('profile.ong');
    }

    public function profileVoluntary(){
        return view('profile.voluntary');
    }

    public function personal(){

    }

    public function message(){

    }

}
