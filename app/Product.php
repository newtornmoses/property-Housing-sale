<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable=['title','price', 'image', 'slug', 
    'model','manufacture', 'size','color',  'description'];


    public function formatPrice()
    {
        return '$'.$this->price.'.00';
    }
}
