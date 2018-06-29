<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
      protected $fillable = [
        'post_ids', 'tag_id',
    ];
    
}
