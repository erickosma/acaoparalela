<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Endereco",
 *      required={user_id, desc, cidade_id},
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
 *          property="desc",
 *          description="desc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="complemento",
 *          description="complemento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bairro",
 *          description="bairro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cidade_id",
 *          description="cidade_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pais_id",
 *          description="pais_id",
 *          type="integer",
 *          format="int32"
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
class Endereco extends Model
{
    use SoftDeletes;

    public $table = 'enderecos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'desc',
        'complemento',
        'bairro',
        'cidade_id',
        'pais_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'desc' => 'string',
        'complemento' => 'string',
        'bairro' => 'string',
        'cidade_id' => 'integer',
        'pais_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'desc' => 'required',
        'cidade_id' => 'required'
    ];
}
