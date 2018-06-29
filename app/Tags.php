<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tags;

class Tags extends Model
{
   
    protected $fillable = [
        'name', 'slug',
    ];
    public function posts()
    {
    	return $this->belongsToMany('App\post','post_tags','tag_id','post_id');
    }
    // function posts(){
    // 	return $this->belongsToMany('App\Tags','post_tags','tag_id','post_id');
    // }
    
}
