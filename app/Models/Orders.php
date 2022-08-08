<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //use HasFactory;
    protected $table = "orders";

    public function orderitem(){
    	return $this->hasMany('App\Models\OrderItem','id_order','id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','id_user','id');
    }
}