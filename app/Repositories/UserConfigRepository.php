<?php

namespace App\Repositories;

use App\Models\UserConfig;
use InfyOm\Generator\Common\BaseRepository;

class UserConfigRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'endereco_confidencial',
        'email_confidencial',
        'telefone_confidencial',
        'notificacao_confidencial'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserConfig::class;
    }
}
