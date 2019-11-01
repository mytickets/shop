<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Cat",
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
 *          property="ident",
 *          description="ident",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="desc",
 *          description="desc",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="image",
 *          description="image",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="xml_name",
 *          description="xml_name",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="menu",
 *          description="menu",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="menu_left",
 *          description="menu_left",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="parent_id",
 *          description="parent_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Cat extends Model
{
    use SoftDeletes;

    public $table = 'cats';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ident',
        'name',
        'desc',
        'image',
        'xml_name',
        'menu',
        'menu_left',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ident' => 'integer',
        'name' => 'integer',
        'desc' => 'integer',
        'image' => 'integer',
        'xml_name' => 'integer',
        'menu' => 'integer',
        'menu_left' => 'integer',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
