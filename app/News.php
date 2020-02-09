<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table ="news";
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function subphu(){
        return $this->belongsTo(Subphu::class,'subphu_id','id');
    }

    public function subcate(){
        return $this->belongsTo(Subcate::class,'subphu_id','id');
    }

    public function cate(){
        return $this->belongsTo(Cate::class,'subphu_id','id');
    }
}
