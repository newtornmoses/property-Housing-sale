@extends('layouts.master')


@section('content')


<section class="signup">
    @include('includes.sessionmsg')

    <h3 class="text-center">Profile</h3>
   <h4 class="text-center">Welcome  <big class="authUser">{{Auth::user()->slug}}</big></h4> 
    <hr>
      <div class="col-md-6 col-md-offset-4">
          <h4>{{$user->email}}</h4>
      </div>
    
</section>





@endsection