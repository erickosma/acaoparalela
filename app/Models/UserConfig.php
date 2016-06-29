<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="UserConfig",
 *      required={user_id},
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
 *          property="endereco_confidencial",
 *          description="endereco_confidencial",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="email_confidencial",
 *          description="email_confidencial",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="telefone_confidencial",
 *          description="telefone_confidencial",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="notificacao_confidencial",
 *          description="notificacao_confidencial",
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
class UserConfig extends Model
{
    use SoftDeletes;

    public $table = 'user_configs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'endereco_confidencial',
        'email_confidencial',
        'telefone_confidencial',
        'notificacao_confidencial'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];
}
