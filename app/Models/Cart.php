<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cart
 * @package App\Models
 * @version November 1, 2019, 4:10 pm UTC
 *
 * @property string session_id
 */
class Cart extends Model
{

    public $table = 'carts';
    



    public $fillable = [
        'session_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'session_id' => 'string'
    ];


    public function total()
    {
        // $this->line_items
        $total_price = 0;
        foreach ($this->line_items as $key => $value) {
            $total_price = $total_price + $value->product->price_amount*$value->qty;
            // echo $total_price."<br>";
        // dd($total_price);
        // dd($total_price);
        }

        return $total_price;
    }

    public function total_qty()
    {
        // $this->line_items
        $qtys = 0;
        foreach ($this->line_items as $key => $value) {
            $qtys = $qtys + $value->qty;
        }

        return $qtys;
    } 


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function line_items()
    {
        return $this->hasMany('App\Models\LineItem');
    }
    
}
