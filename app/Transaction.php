<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id','order_id','rzp_order_id','rzp_payment_id','amount','payment_mode'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
