<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="UserProfessional",
 *      required={user_id , endereco_id },
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="data_nascimento",
 *          description="data_nascimento",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="horario ",
 *          description="horario ",
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
class UserProfessional extends Model
{
    use SoftDeletes;

    public $table = 'user_professionals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'user_id ',
        'endereco_id ',
        'data_nascimento',
        'objetivos',
        'horario '
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'data_nascimento' => 'date',
        'horario ' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'primary',
        'user_id ' => 'unique:required',
        'endereco_id ' => 'unique:required'
    ];
}
