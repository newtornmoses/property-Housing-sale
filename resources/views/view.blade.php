@extends('layouts.master')

<hr>


@section('content')
 
<div class="col md-12 view">
        
    
                <div class="col-md-4 col-sm-6 col-sm-offset-2 col-md-offset-0 ">
                       <img src="{{asset('public/images/'.$property->image)}}" class="img-responsive" alt="">
                       <div class="uploader">
                        <a href="{{route('user.profile', $user->slug  )}}" class="btn btn-dark">Get more deals from the uploader</a> 
                       </div>
                    @if(Auth::check())   
                    @if(Auth::id() != $user->id )
                       <div class="msgLink">
                            <a href="{{route('user.message',  $property->property_slug)}}" class="btn btn-dark">Send a message to uploder</a> 

                    </div>
                    @endif
                    @endif
                    </div>
                   


                    <div class="col-md-4 col-sm-6 col-sm-offset-2 col-md-offset-2 panel-default  more_detials">
                        <div class="panel-heading">
                           <h4> Title:{{$property->property_name}}</h4>
                        </div>
                        <div class="panel-body">
                            <h4 class="text-center  list-group-item"> Description: {{$property->description}}</h4>
                            <h4 class="text-center list-group-item"> Location: {{$property->location}}</h4>
                            <h4 class="text-center list-group-item"> Posted by: {{$user->name}}</h4>
                        </div>
                        <div class="panel-footer">
                                <h4 class="text-center list-group-item"> Price: {{priceConfig($property->price)}}
                                </h4>
                                <h4 class="text-center list-group-item"> Created : {{$property->created_at}} 
                                    </h4>
                                </div>
                             </div>
                      
             
               
           
</div>

<div class="col-md-12">
  <h4 class="bg-orange text-center">More deals from the uploader</h4>


  

  @foreach ($user->properties->slice(0,4) as $userDeals)

  <div class="card col-md-4" style="width: 28rem;">
        <img class="card-img-top" src="{{asset('public/images/'.$userDeals->image)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$userDeals->property_name}}</h5>
          <p class="card-text">
              {{$userDeals->description}}
          </p>
          <a href="{{route('property.view',$userDeals->property_slug )}}" class="btn btn-primary">view Full Details</a>
        </div>
 </div> 
      
  @endforeach
</div>

@endsection



