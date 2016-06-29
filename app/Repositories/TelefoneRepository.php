<?php

namespace App\Repositories;

use App\Models\Telefone;
use InfyOm\Generator\Common\BaseRepository;

class TelefoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'telefone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Telefone::class;
    }
}
