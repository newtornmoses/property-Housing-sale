<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
  protected $fillable = ['user_id', 'sender_id', 'message', 'status', 'property_id'];

  // public $with =['user'];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
