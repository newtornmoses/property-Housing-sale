<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\comments;
use App\User;
class comments extends Model
{
   public function posts()
   {
      return $this->belongsTo('App\Post');
   }

   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
