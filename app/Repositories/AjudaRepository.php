<?php

namespace App\Repositories;

use App\Models\Ajuda;
use InfyOm\Generator\Common\BaseRepository;

class AjudaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'descricao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ajuda::class;
    }
}
