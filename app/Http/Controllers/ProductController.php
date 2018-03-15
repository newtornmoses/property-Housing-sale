<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products =  Product::orderBy('title','asc')
                    ->paginate();


       return view('shop')->with('products',$products);
    }

    /**
     * filter by price.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterPrice()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validate($request, [
          'title'=> 'required',
          'image'=> 'required',
          'price'=> 'required',
          'slug'=> 'required',  
        ]);
      $title = $request->input('title');
       Product::create([
        'title'=> $title,
        'image'=> $request->input('image'),
        'price'=> $request->input('price'),
        'title'=> str_slug($title, '-'),
        'description' => $request->input('description')
          
       ]);
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

       
        $mightAlsoLike =  Product::where('slug','!=', $slug)
                             ->inRandomOrder()
                             ->take(6)->get();
 
        return view('product')->with(['product'=> $product, 'mightAlsoLike' => $mightAlsoLike]);
    }



    public function getbyPrice(Request $request)
    {
       $price1 = $request->input('from');
       $price2 = $request->input('to');
       
   $products = Product::where('price', '>=', $price1)
                    ->where('price', '<=', $price2 )
                    ->paginate();
                    session()->flash('price1' ,$price1 );
                    session()->flash('price2' ,$price2 );
                    
                  
                    
   return   view('shop')->with('products', $products);
    }

//    get items btn 0 -50
    public function getbyFixedPrice()
    {
        $price1 =0;
        $price2 =50;
   $products = Product::where('price', '>=', $price1)
                    ->where('price', '<=', $price2 )
                    ->orderBy('title', 'asc')
                    ->paginate();
   return   view('shop')->with('products', $products);
    }


    //    get items btn 50 -100
    public function getbyFixedPrice2()
    {
        $price1 =50;
        $price2 =100;
   $products = Product::where('price', '>=', $price1)
                    ->where('price', '<=', $price2 )
                    ->orderBy('title', 'asc')
                    ->paginate();
   return   view('shop')->with('products', $products);
    }

    //    get items btn 100 -200
    public function getbyFixedPrice3()
    {
        $price1 =100;
        $price2 =200;
   $products = Product::where('price', '>=', $price1)
                    ->where('price', '<=', $price2 )
                    ->orderBy('title', 'asc')
                    ->paginate();
   return   view('shop')->with('products', $products);
    }


    //    get items btn 200 -500
    public function getbyFixedPrice4()
    {
        $price1 =200;
        $price2 =500;
   $products = Product::where('price', '>=', $price1)
                    ->where('price', '<=', $price2 )
                    ->orderBy('title', 'asc')
                    ->paginate();
   return   view('shop')->with('products', $products);
    }

    //getcart

    public function getcart()
    {
        return view('cart');
    }

    // add to cart

    public function addTocart(Request $request)
    {
    
                   
        Cart::add($request->id,$request->name,1, $request->price)
              ->associate('App\Product');

       
        session()->flash('success', 'successfully added new product');
        

              return view('cart');
    }


    // remove one from  cart

    public function removeOnecart(Request $request)
    {
               
        $cart =Cart::add($request->id,$request->name,-1, $request->price)
              ->associate('App\Product');

              //check for qty equal or lower than zero
              if($cart->qty <=0){
                  Cart::remove($cart->rowId);
              }
       
        session()->flash('success', 'successfully deleted item');
        

              return view('cart');
    }


    //delete from cart

    public function removeCart($id)
    {
        Cart::remove($id);
        session()->flash('success', 'youve successfully deleted the item');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
