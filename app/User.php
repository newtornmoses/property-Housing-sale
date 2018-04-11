<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    public $fillable=[ 'name', 'email','password', 'slug', 'contact_detail', 'country'];


    public function properties()
    {
     return $this->hasMany('App\Property');
    }

    public function messages()
  {
      return $this->hasMany('App\messages');
  }

  // unread
  public function unread()
  {    $msgArr =array();
      $message = 'App\messages'::where('status', 0)
                        ->where('user_id', $this->id)
                        ->get();
       array_push($msgArr, $message);
      return $message;
  }
}









