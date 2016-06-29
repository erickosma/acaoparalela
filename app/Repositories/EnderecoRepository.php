<?php

namespace App\Repositories;

use App\Models\Endereco;
use InfyOm\Generator\Common\BaseRepository;

class EnderecoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desc',
        'complemento',
        'bairro',
        'cidade_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Endereco::class;
    }
}
