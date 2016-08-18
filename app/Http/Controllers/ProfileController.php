<?php

namespace App\Http\Controllers;


use App\Repositories\ProfileRepository;
use App\Models\Util\UtilController;


class ProfileController extends Controller
{
    //

    protected $perfilRepository;
    protected $profile;

    public function __construct(ProfileRepository $perfilRepository)
    {
        $this->perfilRepository = $perfilRepository;
        //$this->api =  app()->make('ApiLocal');
    }

    /**
     * @param ProfileRepository $perfilRepository
     * @return string
     */
    public function complete()
    {
        $redirect = $this->perfilRepository->checkProfileComplete();
        return redirect()->action( UtilController::getName().'@'. $redirect);
    }


    public function escolha()
    {
        $this->profile = $this->perfilRepository->profileUser()->first();
        if (!empty($this->profile->usuario_ong)) {
            $redirect = $this->perfilRepository->redirectUser($this->profile->usuario_ong);
        }
        if (!empty($redirect) && $redirect != "escolha") {
            return redirect()->action('PerfilController@' . $redirect);
        }

        return view('profile.escolha');
    }

    public function voluntario()
    {

        return "voluntario";
    }

    public function ong()
    {
        if(empty($this->profile)){
            $this->profile = $this->perfilRepository->profileUser()->first();
        }
        //verificar se user ong == 1
        if (!empty($this->profile->usuario_ong)) {
            return view('profile.userOngs.edit');
        }
        return view('profile.userOngs.create');
        //return  $this->api->get('userongs');
    }
}
