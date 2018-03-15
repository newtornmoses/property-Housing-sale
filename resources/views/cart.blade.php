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
                  <td>{{tax($item->tax)}}</td>
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

                        </td>

                  
              </tr>

              @endforeach
             
          </tbody>

         
     

  </table>
  <hr>

  <div class="total">
      <h4 class="pull-right totalPrice"> TOTAL = {{ cartDollar(Cart::total())}} </h4>
  </div>

  @else
<h4 class="text-center">
    opps....no items in your cart..plz shop now <a class="btn btn-default" href="{{route('shop.home')}}">SHOP</a>
</h4>

  @endif
    

  
</div>





@endsection