<?php

namespace App\Http\Controllers\Web;


use App\Enums\AddresseType;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Services\Profile;
use App\Services\ProfileVoluntary;
use App\Services\SkillService;

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

    private $skill;

    public function __construct(Profile $profile, SkillService $skill)
    {
        $this->profile = $profile;
        $this->bgColor = $profile->bgColor();
        $this->skill = $skill;
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
            return redirect()->action('Web\ProfileController@profileVoluntary');
        } else if ($userType == UserType::ONG) {
            return redirect()->action('Web\ProfileController@profileOng');
        }
        return view('profile.index');
    }

    public function profileOng()
    {
        return null;
    }

    public function profileVoluntary(ProfileVoluntary $profileVoluntary)
    {
        $id = auth()->user()->id;
        $user = $profileVoluntary->getUserRepository()->find($id);
        $voluntary = $profileVoluntary->getVoluntaryRepository()->findOneBy(['user_id' => $id]);
        $occupations = $this->skill->user($user->id);

        return view('profile.voluntary')
            ->with('bgColor', $this->bgColor)
            ->with('user', $user)
            ->with('voluntary', $voluntary)
            ->with('occupations', $occupations);
    }

    public function profileVoluntaryEdit($id, ProfileVoluntary $profileVoluntary)
    {

        $user = $profileVoluntary->getUserRepository()->find($id);
        $voluntary = $profileVoluntary->getVoluntaryRepository()->find($user->id);
        $occupations = $this->skill->occupationUser($user->id);

        return view('profile.voluntary-edit')
            ->with('bgColor', $this->bgColor)
            ->with('user', $user)
            ->with('voluntary', $voluntary)
            ->with('adressType', AddresseType::VOLUNTARY)
            ->with('occupations', $occupations);
    }

}
