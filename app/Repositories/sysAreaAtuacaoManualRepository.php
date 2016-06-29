<?php

namespace App\Repositories;

use App\Models\sysAreaAtuacaoManual;
use InfyOm\Generator\Common\BaseRepository;

class sysAreaAtuacaoManualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sysAreaAtuacaoManual::class;
    }
}
