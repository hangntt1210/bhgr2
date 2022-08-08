<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
     //use HasFactory;
    protected $table = "combo";

    public function compro(){
    	return $this->hasMany('App\Models\Compro','id_combo','id');
    }
}
