<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['amount'];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
