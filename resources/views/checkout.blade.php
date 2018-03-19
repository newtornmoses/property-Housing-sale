@extends('layouts.master')


@section('content')

<section class="checkout">
    <h3 class="text-center">Check Out</h3>
<div class="checkoutform col-md-6 col-md-offset-3">
    <h4 class="totalcheckout"> Total: {{cartDollar(Cart::instance('default')->total())}}</h4>

    <form action="{{route('product.checkoutPost')}}" method="post" class="checkoutForm">

        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="Name">Email:</label>
            <input type="text" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label for="Address">Address:</label>
            <input type="text" name="address" class="form-control" >
        </div>


        <div class="form-group col-md-4">
            <label for="Contact no">Country Code:</label>
            <input type="text" name="countrycode" class="form-control" placeholder="e.g +44" >
        </div>

        <div class="form-group col-md-8">
            <label for="Contact no">Phone No:</label>
            <input type="text" name="phone" class="form-control" >
        </div>

        <div class="form-group">
            <label for="Card Holder Name">Card Holder Name:</label>
            <input type="text" name="cardholder" class="form-control" >
        </div>

        <div class="form-group">
            <label for="Card Number">Credit Card Number:</label>
            <input type="text" name="cardnumber" class="form-control" placeholder="e.g 4242424242424242" >
        </div>

        <div class="form-group col-md-4">
            <label for="Month">Expiration Month:</label>
            <input type="text" name="exp_month" class="form-control" >
        </div>

        <div class="form-group col-md-4">
            <label for="Year">Expiration Year:</label>
            <input type="text" name="exp_yr" class="form-control" >
        </div>

        <div class="form-group col-md-4">
            <label for="Cvc">Cvc:</label>
            <input type="text" name="cvc" class="form-control" placeholder="e.g 434" >
        </div>
      
        <input type="hidden" name="totalPrice" value="{{Cart::total()}}">
        
        <input type="hidden" name="stripeToken" class="stripeToken" value="">
        

        <button type="submit" class="btn btn-success btn-block buy">Buy Now</button>


    </form>
</div>
    
</section>

<hr>



@endsection