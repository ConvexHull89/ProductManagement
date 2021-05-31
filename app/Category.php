<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_product'];
    public function products(){
        return $this->hasMany('App\Product');
    }
}
