<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file'];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
