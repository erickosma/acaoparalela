<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="UserOng",
 *      required={user_id, endereco_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="endereco_id",
 *          description="endereco_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nome_fantasia",
 *          description="nome_fantasia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="razao_social",
 *          description="razao_social",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="desc_ong",
 *          description="desc_ong",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="site",
 *          description="site",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class UserOng extends Model
{
    use SoftDeletes;

    public $table = 'user_ongs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'endereco_id',
        'nome_fantasia',
        'razao_social',
        'desc_ong',
        'site'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'endereco_id' => 'integer',
        'nome_fantasia' => 'string',
        'razao_social' => 'string',
        'desc_ong' => 'string',
        'site' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'endereco_id' => 'required'
    ];
}
