<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailTrailer extends Model
{
    //
    protected $table ="detail_trailers";
    public function subcate(){
        return $this->belongsTo(Subcate::class,'trailer_id','id');
    }
}
