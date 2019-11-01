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
