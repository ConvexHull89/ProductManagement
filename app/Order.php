<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['ordername','user_id','amount','price','totalprice','date'];
}
