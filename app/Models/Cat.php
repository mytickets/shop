<?php

namespace App\Models;
// use App\Models\Cat;

use Eloquent as Model;

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
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="desc",
 *          description="desc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="image",
 *          description="image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="xml_name",
 *          description="xml_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="parent_id",
 *          description="parent_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="menu",
 *          description="menu",
 *          type="boolean"
 *      )
 * )
 */
class Cat extends Model
{

    public $table = 'cats';
    



    public $fillable = [
        'ident',
        'name',
        'desc',
        'image',
        'xml_name',
        'parent_id',
        'menu',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ident' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'xml_name' => 'string',
        'parent_id' => 'integer',
        'menu' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public $incrementing = false;
    protected $primaryKey = 'ident';
    // public $timestamp = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product','cat_id');
        // return $this->belongsTo('App\Carts');
    }
    // public function category(){
    //     return $this->belongsTo('Category','act_acc_ID');
    // }

    // public function adventures(){
    //     return $this->hasMany('Adventure','act_acc_ID');
    // }

    public function parent()
    {
        return $this->belongsTo('App\Models\Cat', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Cat', 'parent_id');
    }
    
}
