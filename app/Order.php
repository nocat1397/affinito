<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','amount','payment_mode','orderstatus_id'];

    public function purchasers()
    {
        return $this->hasMany('App\Purchaser');
    }
    public function transaction()
    {
        return $this->hasOne('App\Transaction');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function orderstatus() {
        return $this->belongsTo('App\Orderstatus');
    }
}
