<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Product",
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
 *          property="xml_cat",
 *          description="xml_cat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cat_id",
 *          description="cat_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="remote_images",
 *          description="remote_images",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="price_amount",
 *          description="price_amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Product extends Model
{

    public $table = 'products';
    
    protected $primaryKey = 'ident'; // or null
    public $incrementing = false;


    public $fillable = [
        'ident',
        'name',
        'desc',
        'image',
        'xml_name',
        'xml_cat',
        'cat_id',
        'remote_images',
        'price_amount',
        'price'
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
        'xml_cat' => 'string',
        'cat_id' => 'integer',
        'price_amount' => 'float',
        'price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
