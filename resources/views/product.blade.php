@extends('layouts.master')

<hr>


@section('content')
 
<h1 class="well text-center"> WELCOME TO VAXON  OLINE SHOP</h1>

<a href="{{route('shop.home')}}" class="btn btn-info ">Back to Shop</a>
<div class="container ">
        @if($product)
        {{--  product view  --}}
    <div class="panel panel-default col-md-4 product">
        <div class="panel-heading">
           
             {{$product->title}}
        </div>

        <div class="panel-body productImage">
             <img src="{{asset('images/'.$product->image)}}"  id="zoom_01"  class="img-responsive " 
           data-zoom-image="{{asset('images/'.$product->image)}}"
             alt="{{$product->image}}"/>

        </div>

        <div class="panel-footer">
                {{$product->formatPrice()}} <span>
                    <a href="" class="btn btn-success"> Add to cart</a>
                </span>
        </div>
    </div>


{{--  product details  --}}
    <div class="col-md-5  productDetails">

        <div class="title list-group-item ">
            <h3> Product Name: {{$product->title}}</h3>
        </div>
        <div class="description list-group-item ">
            <p>Description:{{$product->description}}</p>
        </div>
        <div class="price list-group-item ">
            <h4>Price: {{$product->formatPrice()}}</h4>
        </div>

        <div class="addToCart list-group-item ">
            <a href="" class="btn btn-success">AddToCart</a>
        </div>
    </div>

<p><hr></p> 
{{--Might Also Like  other products  --}}
    <div class="MayAlsolLike col-md-12">
        <h1 class="text-center">You Might Also Like</h1>
            @foreach($mightAlsoLike as $product)
            <div class="panel panel-default col-md-2 MightAlsoLike">
                <div class="panel-heading">
                    <h6>{{$product->title}}</h6> 
                </div>
        
                <div class="panel-body shopImage">
                        <a href="{{route('product.show', $product->slug)}}">
                     <img src="{{asset('images/'.$product->image)}}"  class="img-responsive" alt="{{$product->image}}">
                        </a>
                </div>
        
                <div class="panel-footer">
                        {{$product->formatPrice()}} <span>
                            <a href="" class="btn btn-success"> Add to cart</a>
                        </span>
                </div>
            </div>
            @endforeach

         
    </div>
    @endif
   
</div>

@endsection



