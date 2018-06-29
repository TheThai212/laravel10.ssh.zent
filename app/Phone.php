<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'mobile', 'user_id',
    ];

     public function User(){
        return $this->belongsTo('App\User');
    }

}
