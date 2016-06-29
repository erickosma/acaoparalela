<?php

namespace App\Repositories;

use App\Models\UserProfessional;
use InfyOm\Generator\Common\BaseRepository;

class UserProfessionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'user_id ',
        'endereco_id ',
        'data_nascimento',
        'objetivos',
        'horario '
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserProfessional::class;
    }
}
