<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compro extends Model
{
   //use HasFactory;
    protected $table = "compro";

    public function product(){
    	return $this->belongsTo('App\Models\Product','id_product','id');
    }

    public function combo(){
    	return $this->belongsTo('App\Models\Combo','id_combo','id');
    }
}
