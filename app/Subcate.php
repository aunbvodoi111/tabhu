<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcate extends Model
{
    //
    protected $table ="subcates";
    // public function news(){
    //     return $this->hasMany(News::class,'subcate_id','id');
    // }
    public function subphu(){
        return $this->hasMany(Subphu::class,'subcate_id','id');
    }
    public function news()
    {
        return $this->hasManyThrough(
            'App\News', 'App\Subphu',
            'subcate_id', 'subphu_id', 'id'
        );
    }
}
