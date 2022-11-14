<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','quantity','quantity_unit','amount','amount_unit'];

    public function images() {
        return $this->belongsToMany('App\Image');
    }
    public function carts() {
        return $this->hasMany('App\Cart');
    }
    public function tag() {
        return $this->belongsTo('App\Tag');
    }
    public function whishlists() {
        return $this->hasMany('App\Whishlist');
    }
    public function purchasers()
    {
        return $this->hasMany('App\Purchaser');
    }
}
