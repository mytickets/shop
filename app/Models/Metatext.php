<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Metatext",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *      ),
 *      @SWG\Property(
 *          property="code_name",
 *          description="code_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="code_text",
 *          description="code_text",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="draft",
 *          description="draft",
 *          type="boolean"
 *      )
 * )
 */
class Metatext extends Model
{
    use SoftDeletes;

    public $table = 'metatexts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code_name',
        'code_text',
        'draft'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code_name' => 'string',
        'draft' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
