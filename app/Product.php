<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    protected $fillable = ['nameproduct','qty','price','description','image'];
}
