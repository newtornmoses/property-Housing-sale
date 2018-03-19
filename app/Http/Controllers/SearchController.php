<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{

 //search
 public function search(Request $request )
 {   
$title = $request->query('search');
    $products = Product::where('title', 'LIKE', '%'.$title.'%')->paginate();
                   // return $products;
                 
                 $request->session()->put('search', $title);
                 
                    return view('shop')->with(['products'=> $products, 'search'=>$title])->with('search',$title);
 }


 

    
}
