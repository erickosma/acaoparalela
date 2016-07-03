<?php

namespace App\Repositories;

use App\Models\userImg;
use InfyOm\Generator\Common\BaseRepository;

class UserImgRepository extends BaseRepository
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
        return userImg::class;
    }
}
