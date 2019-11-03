<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LineItem
 * @package App\Models
 * @version November 1, 2019, 4:13 pm UTC
 *
 * @property integer qty
 * @property integer cart_id
 * @property integer product_id
 * @property integer order_id
 */
class LineItem extends Model
{

    public $table = 'line_items';
    



    public $fillable = [
        'qty',
        'cart_id',
        'product_id',
        'order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'qty' => 'integer',
        'cart_id' => 'integer',
        'product_id' => 'integer',
        'order_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
        
}
