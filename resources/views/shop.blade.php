@extends('layouts.master')

<hr>


@section('content')
{{--  banner  --}}
<section class="banner">
  {{--  <h1 class="text-center heading">
      VAXON SHOP 
  </h1>  --}}
  <img src="{{asset('images/vaxon6.png')}}" class="img-responsive vaxon" alt="">
  <img src="{{asset('images/shoe.png')}}"  class="img-responsive shoe" alt="">
  
  <img src="{{asset('images/shopping_bag.png')}}"  class="img-responsive bag" alt="">
  

  <p class="headingFollow">A Mile away from happiness</p>
</section>
 
<div class="subheader">
        <h3 class="well text-center"> WELCOME TO VAXON  OLINE SHOP</h3>
</div>

 {{--  category section  --}}   
 <div class="categoryAndBrand col-md-3">
     <h4 class="text-center">Filter & Sort</h4>
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h4 class="text-center">Categories</h4>

              
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item outer">
                            <a href="{{route('category.electronics' , 'electrical accessories')}}">
                        Electrical Accessories  <i class="fa fa-television pull-right"></i>
                            </a >

                            <ul class="inner">
                                    <li class="list-group-item innerli innerDeep">laptops & desktops
                                            <ul class="ulnner">
                                                    <li class="list-group-item innerInner"> Accer </li> 
                                                    <li class="list-group-item innerInner">Dell</li>
                                                    <li class="list-group-item innerInner">Toshiba</li>
                                                    <li class="list-group-item innerInner">Sony</li>
                                                    <li class="list-group-item innerInner">Mac book</li>
                                                    <li class="list-group-item innerInner">I-Mac</li>
                                                    <li class="list-group-item innerInner">Lenovo</li>
                                               
                                                </ul>

                                    </li>
                                    <li class="list-group-item innerli innerDeep">Home Accessories
                                            <ul class="ulnner">
                                                    <li class="list-group-item innerInner"> LCD & LED Tvs </li> 
                                                    <li class="list-group-item innerInner">Fridges</li>
                                                    <li class="list-group-item innerInner">others</li>

                                                </ul>
                                    </li>
                                    
                                </ul>
                    </li>

                      <li class="list-group-item outer">
                            <a href="{{route('category.phones' , 'phone accessories')}}">                          
                            Phone Accessories  <i class="fa fa-phone pull-right"></i>
                            </a>

                            <ul class="inner">
                                    <li class="list-group-item innerli">Phones
                                            <ul class="innerInner">
                                                    <li class="list-group-item innerInner">I-Phones/ Apple</li>
                                                    <li class="list-group-item innerInner">Samsung</li>
                                                    <li class="list-group-item innerInner">Sony</li>
                                                    <li class="list-group-item innerInner">Htc</li>
                                                    <li class="list-group-item innerInner">Lg</li>
                                                    <li class="list-group-item innerInner">others</li>
                                                   
                                                </ul>
                                    </li>
                                    <li class="list-group-item innerli">Accessories
                                            </li>
                                </ul>
                        </li>

                        <li class="list-group-item outer">
                                <a href="{{route('category.video' , 'video & camera')}}">                            
                               Video & Camera  <i class="fa fa-video-camera pull-right"></i>
                                </a>

                                <ul class="inner">
                                        <li class="list-group-item innerli">Sonny</li>
                                        <li class="list-group-item innerli">Panasonic</li>
                                        <li class="list-group-item innerli">Nikon</li>
                                        <li class="list-group-item innerli">Cannon</li>
                                        <li class="list-group-item innerli">Others</li>
                                      
                                    </ul>
                            </li>

                        <li class="list-group-item outer">
                                <a href="{{route('category.men' , 'men ware')}}">                            
                                Men Ware   <i class="fa fa-male pull-right"></i>
                                </a>

                                <ul class="inner">
                                    <li class="list-group-item innerli">T-shirts</li>
                                    <li class="list-group-item innerli">Pants</li>
                                    <li class="list-group-item innerli">Shorts</li>
                                    <li class="list-group-item innerli">Trousers</li>
                                    <li class="list-group-item innerli">Suites</li>                                    
                                    <li class="list-group-item innerli">Watches</li>
                                    <li class="list-group-item innerli">Caps</li>
                                    <li class="list-group-item innerli">Shoes</li>
                                </ul>
                            </li>

                            <li class="list-group-item outer">
                                <a href="{{route('category.women' , 'women ware')}}">                                
                                        Women Ware  <i class="fa fa-female pull-right"></i>
                                </a>

                                <ul class="inner">
                                        <li class="list-group-item innerli">T-shirts</li>
                                        <li class="list-group-item innerli">Pants</li>
                                        <li class="list-group-item innerli">Trousers</li>
                                        <li class="list-group-item innerli">Watches</li>
                                        <li class="list-group-item innerli">Shoes</li>
                                    </ul>
                                </li>

                                <li class="list-group-item outer">
                                        <a href="{{route('category.kids' , 'kids ware')}}">                                   
                                                    Kids Ware   <i class="fa fa-child pull-right"></i>
                                        </a>
                                    <ul class="inner">
                                            <li class="list-group-item innerli">T-shirts</li>
                                            <li class="list-group-item innerli">Pants</li>
                                            <li class="list-group-item innerli">Shorts</li>
                                            <li class="list-group-item innerli">Suites</li>
                        
                                            <li class="list-group-item innerli">dresses</li>
                                            <li class="list-group-item innerli">Shoes</li>
                                        </ul>
                                </li>


                            <li class="list-group-item outer">
                                <a href="{{route('category.toys' , 'toys')}}">                                        
                                                Toys    <i class="fa fa-gamepad pull-right"></i>
                                </a>

                                    <ul class="inner">
                                            <li class="list-group-item innerli">Kids-Toys</li>
                                            <li class="list-group-item innerli">Mature Toys</li>
                                            <li class="list-group-item innerli">Sex Toys</li>
                                            
                                        </ul>
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
                    
          
                    <form action="{{route('product.price')}}" method="get">
                        <div class="form-group">
                                <label for="From">From</label>
                                <input type="number" name="from" class="form-control" id="from" placeholder="e.g $50" value="{{session('price1')? session('price1'): ''}}" required>
                        </div>
                        {{--  {{session('price1')? session('price1'): ''}}  --}}

                        <div class="form-group">
                                <label for="To">To</label>
                                <input type="number" name="to" class="form-control" id="to" placeholder="e.g $200" value="{{session('price2')? session('price2'): ''}}" required>
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
    
    
    @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator )

    {{$products->appends([
        'to'=> session('price2')? session('price2'): '',
        'from'=> session('price1')? session('price1'): '',
        'search'=>session('search')
        
    ])->links()}}
 
 @endif
 </div>
 <form action="{{route('product.search')}}" method="get" class="searchForm">
    <input type="text" class="form-control" name="search"  value="{{old('search')}}" placeholder="search for products">
        <button type="submit" class="searchbtn btn btn-default">search</button>
  
    {{csrf_field()}}

</form>




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

                            {{--  hidden fields  --}}
                    <form action="{{route('shop.cart')}}" method="post">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->title}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <button type="submit" class="btn btn-success">Add to cart</button>
                        
                            {{csrf_field()}}
                            
                        </form>
    
                </span>
        </div>


    </div>
       
    @endforeach
    
   

    @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator )

    {{$products->appends([
        'to'=> session('price2')? session('price2'): '',
        'from'=> session('price1')? session('price1'): '',
        'search'=>session('search')
        
    ])->links()}}
    @endif

    
</div>

@endsection

