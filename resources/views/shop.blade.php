@extends('layouts.master')

<hr>


@section('content')
 
<h1 class="well text-center"> WELCOE TO VAXON  OLINE SHOP</h1>


<div class="container ">
    @foreach($products as $product)
    <div class="panel panel-default col-md-4 shop">
        <div class="panel-heading">
             {{$product->title}}
        </div>

        <div class="panel-body">
             <img src="{{asset('images/'.$product->image)}}"  class="img-responsive" alt="{{$product->image}}">

        </div>

        <div class="panel-footer">
                {{$product->price}}
        </div>
    </div>
    @endforeach
</div>

@endsection

