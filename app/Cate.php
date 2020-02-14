<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table ="cates";
    
    public function pageStatic(){
        return $this->hasOne(PageStatic::class,'cate_id','id');
    }
    public function subcates(){
        return $this->hasMany(Subcate::class,'cate_id','id');
    }

    public function news()
    {
        return $this->hasManyThrough(
            'App\News', 'App\Subphu',
            'subcate_id', 'subphu_id', 'id'
        )->orderBy('id','DESC');
    }
}
