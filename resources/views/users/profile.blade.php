
<meta name="csrf-token" content="{{csrf_token()}}">
<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

@extends('layouts.master')


@section('content')


<div class="userSection">
    @include('includes.sessionmsg')
  <div class="col-md-12 col-sm-12 profile user">
  
   <div class="col-md-4 col-sm-12 col-md-offset-4 col-sm-offset-4  profileDetails">
     <h5 class="text-center">{{$user->name}} Profile</h5>
         <div class="card">
           <div class="img-card-top">

           </div>
           <div class="card-body">
             <div class="card-title">
               <h4>Name: {{$user->name}}</h4>
             </div>
             <div class="card-text">
              <h6>Location:  {{$user->country}}</h6>
              <h6>Email:  {{$user->email}}</h6>
              <h6>Contact:  {{$user->contact_detail}}</h6>
              
             </div>
           </div>
         </div>
   </div>
  </div>

  
  



          </div>



{{-- profile component --}}
<profile-component :user_id={{$user->id}}  :property_userid={{$property_id}}></profile-component>
   
    
@endsection


  

