<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','description','quantity','quantity_unit','amount','amount_unit','features'];

    protected $casts = [
        'features' => 'array'
    ];
    public function images() {
        return $this->belongsToMany('App\Image');
    }
    public function carts() {
        return $this->hasMany('App\Cart');
    }
    public function category() {
        return $this->belongsTo('App\Category');    
    }
    public function whishlists() {
        return $this->hasMany('App\Whishlist');
    }
    public function purchasers()
    {
        return $this->hasMany('App\Purchaser');
    }
}
