<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankyou()
    {
       return view('thankyou');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {  
        return view('thankyou');
    

    // //    Stripe::setApiKey('3232323')
    //    try{
    //     //    Stripe::charges->create
    //        Charge::create([
    //     'amount'=>$request->totalPrice,
    //     'currency'=> 'USD',
    //     'source'=>$request->stripeToken,
    //     'description'=> 'Order',
    //     'reciept_email'=>$request->email,
    //     'Metadata'=> [

    //     ]
    //        ]);

    //        return view('shop')->with('success', 'successfully made paiyment' );
    //    }catch(\Exception $e){
    //        return view('cart')->with('error', $e->getMessage());
    //    }
    }

   
}
