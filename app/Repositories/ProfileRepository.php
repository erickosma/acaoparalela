<?php

namespace App\Repositories;

use App\Models\Profile;
use InfyOm\Generator\Common\BaseRepository;

class ProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Profile::class;
    }


    public function checkProfileComplete()
    {
        //nao tem perfil
        if ($this->checkHasProfile() == false) {
            $this->createUserProfileEmpty();
            return 'escolha';
        }
        $profile =  $this->profileUser()->first();
        if($profile->completo){
            return $this->redirectUser($profile->usuario_ong);
        }
        //faz outrs checagens
        return "escolha";
    }

    /**
     * Dpois passar isso pra tabela
     *
     * @param $tipo
     * @return string
     */
    public function redirectUser($tipo){
        switch ($tipo){
            case 1:
                return 'ong';
                break;
            case 2:
                return 'voluntario';
                break;
        }
        return 'escolha';
    }

    protected function createUserProfileEmpty(){
        return $this->create(['completo' => 0,
            'usuario_ong' => 0,
            'user_id' => auth()->user()->id]);
    }
    /**
     * @return mixed
     */
    public function checkHasProfile()
    {
        $profile = $this->profileUser();
        if ($profile->count() > 0) {
            return true;
        }
        return false;
    }

    public function profileUser()
    {
        return $this->findByField('user_id', auth()->user()->id);
    }
}
