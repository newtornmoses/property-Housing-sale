@extends('layouts.master');

@section('content')
 <div class="thankyou col-md-4 col-md-offset-4" >

 {{--  <h1 class="text-center thanksText">THANK YOU</h1>  --}}
 <div class="letters">
 <h1 class="text-center thanksText">T</h1>
 <h1 class="text-center thanksText">H</h1>
 <h1 class="text-center thanksText">A</h1>
 <h1 class="text-center thanksText">N</h1> 
 <h1 class="text-center thanksText">K </h1>
 <h1 class="text-center thanksText">YOU</h1>
</div>
 
 
 

  <p class="text-center">we have sent you an order details message to your email </p>  
  <a href="{{route('shop.home')}}" class="btn btn-primary btn-block subscribe thanksbtn">Back Home</a>
     </div> 

@endsection