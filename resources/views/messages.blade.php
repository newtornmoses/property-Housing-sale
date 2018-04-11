
<meta name="csrf-token" content="{{csrf_token()}}">
<script>window.laravel={csrfToken:'{{csrf_token()}}'} </script>

@extends('layouts.master')


@section('content')

<div class="messagesPanel">
        @include('includes.sessionmsg')
 @if($property)       
        @if(Auth::id() !=$property->user->id)
    <h5 class="sendingTo"> Your are sending to {{$property->user->name}}</h5>

      <div class="card message col-md-4 pull-right">
            <div class="card-body">
                   <div class="card-text">
                        <h5 class="bg-light p-3">{{$property->property_name}}</h5>
                   </div>
                           

            </div>
           
                    <img src="{{asset('public/images/'.$property->image)}}" class="card-img-top" alt="">
            
       </div>
 
 
    @endif

    @endif
   

   
    <messages-component :user_id={{Auth::id()}}  :reciever_id={{$property?$property->user->id:Auth::id()}}  :property_id={{$property?$property->id:NAN}} ></messages-component>

</div>

<div class="otherFeaturedProperties col-md-12 col-sm-12 col-xs-12 col-xs-offset-2 col-sm-offset-2 col-md-offset-0">
    <hr>
    <h4 class="text-center">
      <u> Other Featured Properties</u>
     
    
    </h4>
    @foreach ($prop->slice(0,4) as $otherProperties)

  <div class="card col-md-4 col-sm-6  col-md-offset-0 col-xs-offset-0 col-sm-offset-4" style="width: 28rem;">
        <img class="card-img-top" src="{{asset('public/images/'.$otherProperties->image)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$otherProperties->property_name}}</h5>
          <p class="card-text">
              {{$otherProperties->description}}
          </p>
          <a href="{{route('property.view',$otherProperties->property_slug )}}" class="btn btn-primary">view Full Details</a>
          <a href="{{route('user.message',  $otherProperties->property_slug)}}" class="btn btn-dark">Send a message to uploder</a> 

        </div>
 </div> 
      
  @endforeach
</div>
 


@endsection



<script src="{{asset('js/app.js')}}"></script>

<script>
        
</script>