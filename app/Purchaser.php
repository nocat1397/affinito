<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaser extends Model
{
    protected $fillable = ['product_id','quantity','order_id','user_id'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
