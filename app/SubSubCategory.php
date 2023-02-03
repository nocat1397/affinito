<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    protected $fillable = ['category_id','sub_category_id','name','file'];
    public function categories() {
        return $this->belongsTo('App\Category');    
    }
    public function subcategory() {
        return $this->belongsTo('App\SubCategory');    
    }
    public function products() {
        return $this->hasMany('App\Product');    
    }
}
