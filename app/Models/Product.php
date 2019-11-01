<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Product
 * @package App\Models
 * @version November 1, 2019, 3:12 pm UTC
 *
 * @property string name
 * @property string desc
 * @property string image
 * @property string xml_name
 * @property string xml_cat
 * @property integer cat_id
 * @property string remote_images
 * @property number price_amount
 */
class Product extends Model
{

    public $table = 'products';
    



    public $fillable = [
        'name',
        'desc',
        'image',
        'xml_name',
        'xml_cat',
        'cat_id',
        'remote_images',
        'price_amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'xml_name' => 'string',
        'xml_cat' => 'string',
        'cat_id' => 'integer',
        'price_amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
