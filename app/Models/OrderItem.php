<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //use HasFactory;
    protected $table = "orderitem";

    public function product(){
    	return $this->belongsTo('App\Models\Product','id_product','id');
    }

    public function orders(){
    	return $this->belongsTo('App\Models\Orders','id_order','id');
    }
}