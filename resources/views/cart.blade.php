@extends('layouts.master')


@section('content')


<div class="col-md-10 col-md-offset-1 cart">
        @include('includes.sessionmsg')
    <h4 class="text-center cartHeading">Your Cart</h4>
    
    @if (Cart::count() >0)
       
      <p>Total Items: <span class="badge">{{Cart::instance('default')->count()}}</span> </p>
  <table class="table table-hover table-stripped" >
     
          <thead>
                <tr>
                  <th> IMAGE</th>
                  <th> ITEM</th>
                  <th> PRICE</th>
                  <th> TOTAL</th>
                  <th> TAX 12%</th>
                  <th> SUBTOTAL</th>
                  <th> ACTIONS</th>
                  
                  
                </tr>
          </thead>

          <tbody>
              
                @foreach(Cart::content() as $item)
              <tr>
                  <td>
    <img src="{{asset('images/'.$item->model->image)}}" width="100px" 
    height="auto"  class="img-responsive" alt="{{$item->model->title}}" >

                  </td>
                  <td>{{$item->model->title}}</td>                  
                    <td>{{$item->model->formatPrice()}}</td>
                  <td>{{$item->qty}}</td>
                  <td>{{$item->tax}}</td>
                    <td>{{cartPrice($item->subtotal)}}</td>
                        <td>
                           
                            <div class="increaseDecreaseForms">
                              {{--  increment by one  --}}
                            <form action="{{route('shop.cart')}}" method="post">

                                    <button type="submit" class="btn btn-success increment">
                                            <i class="fa fa-caret-up"></i>
                                    </button>
                                    {{csrf_field()}}
                                    {{--  hidden fields  --}}
                                    <input type="hidden" name="id" value={{$item->model->id}}>
                                    <input type="hidden" name="name" value={{$item->model->title}}>
                                    <input type="hidden" name="price" value={{$item->model->price}}>
                                    
                            </form>


                             {{--  decrement by one  --}}
                             <form action="{{route('shop.cartDecrease')}}" method="post">

                                    <button type="submit" class="btn btn-warning decrement">
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                    {{csrf_field()}}
                                    {{--  hidden fields  --}}
                                    <input type="hidden" name="id" value={{$item->model->id}}>
                                    <input type="hidden" name="name" value={{$item->model->title}}>
                                    <input type="hidden" name="price" value={{$item->model->price}}>
                                    
                            </form>


                            
                           {{--  Remove from cart  --}}
                        <form action="{{route('shop.delete', $item->rowId)}}" method="post">

                                <button type="subit" class="btn btn-danger remove">
                                        <i class="fa fa-remove"></i>
                                </button>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                        </form>
                        </div>

                        <form action="{{route('shop.saveForLater', $item->rowId)}}" method="post">

                          <button type="submit" class="saveForLater">saveForLater</button>

                          {{csrf_field()}}
                          
                  </form>
                       
                        </td>

                  
              </tr>

              @endforeach
             
          </tbody>

         
     

  </table>
  <hr>

  <div class="total">
      <a href="{{route('product.checkout')}}" class="btn btn-success checkout pull-right">Check Out</a>
      <h4 class="pull-right totalPrice"> TOTAL = {{ cartDollar(Cart::total())}} </h4>
     
  </div>

  @else
<h4 class="text-center">
    opps....no items in your cart..plz shop now <a class="btn btn-default" href="{{route('shop.home')}}">SHOP</a>
</h4>

  @endif
    

  
</div>


<div class="saveForLater col-md-10 col-md-offset-1">
<h4 class="text-center">
  @if (Cart::instance('saveForLater')->count()>0)
        <span class="badge">{{Cart::instance('saveForLater')->count()}}</span> <u> ITEMS SAVED FOR LATER</u>
  @endif
      
</h4>
@foreach (Cart::instance('saveForLater')->content() as $item)
    

<div class="well savedForLaterView">
<div class="image">
    <img src="{{asset('images/'.$item->model->image)}}" width="100px" 
    height="auto"  class="img-responsive" alt="">
  </div>

  <div class="carttitle">
  <h4>Title: </h4>
  <p>{{$item->model->title}}</p>
</div>
  

<div class="cartprice">
 <h4>Price: </h4> <p>{{cartPrice($item->price)}} </p>
 </div>

 <div class="qty">
    <h4>Qty:  </h4> <p>{{$item->qty}}</p> 
    </div>


 <div class="sendTocart">
 <form action="{{route('shop.sendTocart', $item->rowId)}}" method="post">

    <button type="submit" class="saveForLater">Send To Cart</button>

    {{csrf_field()}}
    
</form>

</div>

<div class="sendTocart">
    <form action="{{route('shop.RemovesaveForLater', $item->rowId)}}" method="post">
   
       <button type="submit" class="saveForLater">remove</button>
   
       {{csrf_field()}}
       
   </form>
   
   </div>

 
</div>
@endforeach

</div>





@endsection