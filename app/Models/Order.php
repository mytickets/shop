<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Order
 * @package App\Models
 * @version November 1, 2019, 4:16 pm UTC
 *
 * @property integer pay_type
 * @property string adr
 * @property number total
 */
class Order extends Model
{

    public $table = 'orders';
    



    public $fillable = [
        'pay_type',
        'adr',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pay_type' => 'integer',
        'total' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
