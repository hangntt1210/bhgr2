<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use HasFactory;
    protected $table = "product";

    public function type(){
    	return $this->belongsTo('App\Models\Type','id_type','id');
    }

    public function material(){
        return $this->belongsTo('App\Models\Material','id_material','id');
    }

    public function compro(){
    	return $this->hasMany('App\Models\Compro','id_product','id');
    }

    public function orderitem(){
    	return $this->hasMany('App\Models\Orderitem','id_product','id');
    }
}
