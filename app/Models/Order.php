<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Order
 * @package App\Models
 * @version November 5, 2019, 12:54 am UTC
 *
 * @property string pay_type
 * @property string pay_place
 * @property string pay_adr
 * @property string pay_contact
 * @property number pay_discount
 * @property string status
 * @property string comment
 */
class Order extends Model
{

    public $table = 'orders';

    public $fillable = [
        'pay_type',
        'pay_place',
        'pay_adr',
        'pay_contact',
        'pay_discount',
        'status',
        'comment',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pay_type' => 'string',
        'pay_place' => 'string',
        'pay_contact' => 'string',
        'pay_discount' => 'float',
        'status' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function line_items()
    {
        return $this->hasMany('App\Models\LineItem', 'order_id');
    }        

    public function total()
    {
        $total_price = 0;
        foreach ($this->line_items as $key => $value) {
            $total_price = $total_price + $value->product->price_amount*$value->qty;
        }
        return $total_price;
    }



    public function remove_items()
    {
        foreach ($this->line_items as $key => $value) {
            $value->delete();
        }
    }


    public function total_qty()
    {
        $qtys = 0;
        foreach ($this->line_items as $key => $value) {
            $qtys = $qtys + $value->qty;
        }
        return $qtys;
    } 



}
