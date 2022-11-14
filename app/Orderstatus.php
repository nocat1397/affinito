<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    protected $fillable = ['name'];

    public function orders() {
        return $this->hasMany('App\Order');    
    }
}
