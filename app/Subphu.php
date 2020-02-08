<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subphu extends Model
{
    //
    protected $table ="subphus";
    public function news(){
        return $this->hasMany(News::class,'subphu_id','id');
    }
}
