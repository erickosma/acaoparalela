<?php

namespace App\Repositories;

use App\Models\UserAreaAtuacao;
use InfyOm\Generator\Common\BaseRepository;

class UserAreaAtuacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'id_area_atuacao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserAreaAtuacao::class;
    }
}
