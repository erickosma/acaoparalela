<?php

namespace App\Http\Controllers;


use App\Enums\UserType;
use App\Models\Profile;
use App\Models\ProfileVoluntary;
use App\User;

class ProfileController extends Controller
{
    /**
     * @var Profile
     */
    private $profile;
    /**
     * @var string
     */
    private $bgColor;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
        $this->bgColor =  $profile->bgColor();
    }

    public function index()
    {
        $id = auth()->user()->id;
        $userType = $this->profile->userType($id);

        if ($userType == UserType::VOLUNTARY) {
            return redirect()->action('ProfileController@profileVoluntary');
        } else if ($userType == UserType::ONG) {
            return redirect()->action('ProfileController@profileOng');
        }
        return view('profile.index');
    }

    public function profileOng()
    {
        return view('profile.ong')
            ->with('bgColor', $this->bgColor)
            ->with();
    }

    public function profileVoluntary(ProfileVoluntary $profileVoluntary)
    {
        $id = auth()->user()->id;
        $user =  $profileVoluntary->getUserRepository()->find($id);
        $voluntary = $profileVoluntary->getVoluntaryRepository()->find($id);

        return view('profile.voluntary')
            ->with('bgColor', $this->bgColor)
            ->with('user', $user)
            ->with('voluntaty', $voluntary);
    }

    public function profileVoluntaryEdit(User $user, ProfileVoluntary $profileVoluntary){
        $user =  $profileVoluntary->getUserRepository()->find($user->id);
        $voluntary = $profileVoluntary->getVoluntaryRepository()->find($user->id);

        return view('profile.voluntary-edit')
            ->with('bgColor', $this->bgColor)
            ->with('user', $user)
            ->with('voluntaty', $voluntary);
    }

    public function personal()
    {

    }

    public function message()
    {

    }



}
