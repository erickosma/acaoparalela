<?php

namespace App\Http\Controllers;


use App\Enums\UserType;
use App\Models\Profile;
use App\Models\ProfileVoluntary;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;

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

    public function personal()
    {

    }

    public function message()
    {

    }



}
