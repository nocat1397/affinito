<?php

namespace App;

use App\SubSubCategory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id','name','file'];

    public function subsubcategories() {
        return $this->hasMany('App\SubSubCategory');    
    }
    
    public function categories() {
        return $this->belongsTo('App\Category');    
    }
    public function products() {
        return $this->hasMany('App\Product');    
    }
}
