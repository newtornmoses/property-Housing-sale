@extends('layouts.master')

<hr>


@section('content')
{{--  banner  --}}
<section class="banner">
  <h1 class="text-center heading">
      VAXON SHOP 
  </h1>
  <p class="headingFollow">A Mile away from happiness</p>
</section>
 
<div class="subheader">
        <h3 class="well text-center"> WELCOME TO VAXON  OLINE SHOP</h3>
</div>

 {{--  category sorting  --}}


     
 <div class="categoryAndBrand col-md-3">
     <h4 class="text-center">Filter & Sort</h4>
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h4 class="text-center">Categories</h4>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        Electrical Accessories  <i class="fa fa-television pull-right"></i>
                    </li>

                      <li class="list-group-item">
                            Phone Accessories  <i class="fa fa-phone pull-right"></i>
                        </li>

                        <li class="list-group-item">
                               Video & Camera  <i class="fa fa-video-camera pull-right"></i>
                            </li>

                        <li class="list-group-item">
                                Men Ware   <i class="fa fa-male pull-right"></i>
                            </li>

                            <li class="list-group-item">
                                    Women Ware  <i class="fa fa-female pull-right"></i>
                                </li>

                                <li class="list-group-item">
                                        Kids Ware   <i class="fa fa-child pull-right"></i>
                                    </li>

                                    <li class="list-group-item">
                                            Toys    <i class="fa fa-gamepad pull-right"></i>
                                        </li>

                                        
                </ul>

            </div>
            <div class="panel-footer">

            </div>
        </div>


        <div class="panel panel-primary">
                <div class="panel-heading">
                   <h4 class="text-center">Price Range <i class="fa fa-dollar"></i></h4>
                </div>
                <div class="panel-body">

                    <h4 class="text-center">Manual Filter</h4>
          
                    <form action="{{route('product.price')}}" method="post">
                        <div class="form-group">
                                <label for="From">From</label>
                                <input type="number" name="from" class="form-control" id="from" placeholder="e.g $50" value="">
                        </div>

                        <div class="form-group">
                                <label for="To">To</label>
                                <input type="number" name="to" class="form-control" id="to" placeholder="e.g $200">
                        </div>


                        <div class="form-group">
                              <button type="submit" class="btn btn-info">Search</button>
                        </div>

           {{csrf_field()}}
                    
                    </form>
                
                        <ul class="list-group">
                        <a href="{{route('product.priceFixed')}}">
                                <li class="list-group-item">
                                   $0.00   ---------   $50.00
                                </li>
                            </a>

                        <a href="{{route('product.priceFixed2')}}">
                            
                                  <li class="list-group-item">
                                        $50.00 --------- $100.00
                                    </li>
                        </a>

                        <a href="{{route('product.priceFixed3')}}">
                                    
                                    <li class="list-group-item">
                                            $100.00 --------- $200.00
                                        </li>
                        </a>

                        <a href="{{route('product.priceFixed4')}}">
                                        
                                        <li class="list-group-item">
                                                $200.00 --------- $500.00
                                            </li>
                        </a>

                        </ul>
                </div>
                <div class="panel-footer">
    
                </div>
            </div>
 </div>



{{--  search pannel  --}}
 <div class="col-md-8 productsSearch">
        {{ $products->links() }}

        <form action="" method="post" class="searchForm">
                <input type="text" class="form-control" name="search" placeholder="search for products">
                    <button type="submit" class="searchbtn btn btn-default">search</button>
              
                {{csrf_field()}}

        </form>
 </div>
 <div class="container col-md-9 ">
        
    {{--  All Products view  --}}
    @foreach($products as $product)
    <div class="panel panel-default col-md-4 shop">
        <div class="panel-heading">
             {{$product->title}}
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
    
    {{ $products->links() }}
</div>

@endsection

