<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  //get categories
  public function getcat()
  {
      $cat = Category::all();
      return view('product')->with('categories', $cat);
  }


    //fetch men category click
 public function catMen($cat)
 {
     $cat =4;
   $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                     ->where('categories.id', 'LIKE', '%'. $cat. '%')
                          ->paginate();

                          return view('shop')->with('products', $products);
  
 }



    //fetch wommen category click
    public function catWomen($cat)
    {
        $cat =5;
      $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                        ->where('categories.id', 'LIKE', '%'. $cat. '%')
                             ->paginate();
   
                             return view('shop')->with('products', $products);
     
    }



    //fetch kids category click
    public function catKids($cat)
    {
        $cat =6;
      $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                        ->where('categories.id', 'LIKE', '%'. $cat. '%')
                             ->paginate();
   
                             return view('shop')->with('products', $products);
     
    }


    //fetch electrical category click
    public function catElec($cat)
    {
        $cat =1;
      $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                        ->where('categories.id', 'LIKE', '%'. $cat. '%')
                             ->paginate();
   
                             return view('shop')->with('products', $products);
     
    }


    //fetch phone acc category click
    public function catPhone($cat)
    {
        $cat =2;
      $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                        ->where('categories.id', 'LIKE', '%'. $cat. '%')
                             ->paginate();
   
                             return view('shop')->with('products', $products);
     
    }



    //fetch toys acc category click
    public function catToys($cat)
    {
        $cat =7;
      $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                        ->where('categories.id', 'LIKE', '%'. $cat. '%')
                             ->paginate();
   
                             return view('shop')->with('products', $products);
     
    }


    //fetch video category click
    public function catVideo($cat)
    {
        $cat =3;
      $products =Product::join('categories', 'products.category_id', '=' ,'categories.id')
                        ->where('categories.id', 'LIKE', '%'. $cat. '%')
                             ->paginate();
   
                             return view('shop')->with('products', $products);
     
    }


}
