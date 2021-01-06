<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded=[];
//    protected $guarded=[];

    public function blogComments(){
        return $this->hasMany('App\BlogComment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tag(){
        return $this->belongsTo('App\Tag');
    }


}
