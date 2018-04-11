<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

  public  $fillable =[ 'property_name', 'property_slug', 'user_id', 'price', 'location', 'description', 'image'];
    public function user()
    {
     return $this->belongsTo('App\User');
    }
}
