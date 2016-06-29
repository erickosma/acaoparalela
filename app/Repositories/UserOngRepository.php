<?php

namespace App\Repositories;

use App\Models\UserOng;
use InfyOm\Generator\Common\BaseRepository;

class UserOngRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'endereco_id',
        'nome_fantasia',
        'razao_social',
        'desc_ong'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserOng::class;
    }
}
