<?php

namespace App\Http\Controllers;


use App\Enums\UserType;
use App\Models\Profile;
use App\Models\ProfileVoluntary;
use App\Models\System;
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

    private $system;

    public function __construct(Profile $profile, System $system)
    {
        $this->profile = $profile;
        $this->bgColor = $profile->bgColor();
        $this->system = $system;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @see profileVoluntary|profileOng
     */
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
        $user = $profileVoluntary->getUserRepository()->find($id);
        $voluntary = $profileVoluntary->getVoluntaryRepository()->find($id);


        return view('profile.voluntary')
            ->with('bgColor', $this->bgColor)
            ->with('user', $user)
            ->with('voluntary', $voluntary);
    }

    public function profileVoluntaryEdit($id, ProfileVoluntary $profileVoluntary)
    {
        $user = $profileVoluntary->getUserRepository()->find($id);
        $voluntary = $profileVoluntary->getVoluntaryRepository()->find($user->id);

        return view('profile.voluntary-edit')
            ->with('bgColor', $this->bgColor)
            ->with('user', $user)
            ->with('voluntary', $voluntary);
    }

}
