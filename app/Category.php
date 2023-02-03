<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','file'];

    public function subcategories() {
        return $this->hasMany('App\SubCategory');    
    }
    public function subsubcategories() {
        return $this->hasMany('App\SubSubCategory');    
    }
    public function products() {
        return $this->hasMany('App\Product');    
    }
}
