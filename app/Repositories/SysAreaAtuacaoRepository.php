<?php

namespace App\Repositories;

use App\Models\SysAreaAtuacao;
use InfyOm\Generator\Common\BaseRepository;

class SysAreaAtuacaoRepository extends BaseRepository
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
        return SysAreaAtuacao::class;
    }
}
