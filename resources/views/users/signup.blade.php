@extends('layouts.master')


@section('content')


<section class="signup">
   
    <h3 class="text-center">Sign up</h3>
    <hr>
<div class="signupForm col-md-6 col-sm-12  col-xs-8 col-xs-offset-3 col-md-offset-3   col-sm-offset-3">
    <form action="{{route('user.signup')}}" method="post" class="signupForm">
            <div class="form-group">
            <label for="Username">Username:</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
            @if($errors->any())
            @foreach ($errors->get('name') as $error) 
               <p class="alert-danger">{{$error}}</p> 
            @endforeach 

            @endif
        
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}" required>
            @if($errors->any())
            @foreach ($errors->get('email') as $error) 
               <p class="alert-danger">{{$error}}</p> 
            @endforeach 

            @endif
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
         @if($errors->any())
            @foreach ($errors->get('password') as $error) 
               <p class="alert-danger">{{$error}}</p> 
            @endforeach 

            @endif
        </div>

    
        <h4 class="col-md-12">Contact Details</h6> 
        <div class="form-group col-md-4">
            
               
            <label for="contact_detail">Country Code:</label>
            <input type="text" name="code" class="form-control " required>
         @if($errors->any())
            @foreach ($errors->get('code') as $error) 
               <p class="alert-danger">{{$error}}</p> 
            @endforeach 

            @endif
        </div>
     


        <div class="form-group col-md-8 phoneNumber" style="background:none">
            
                <label for="contact_detail">Phone No:</label>
                <input type="phone_number" name="phone_number" class="form-control" required>
             @if($errors->any())
                @foreach ($errors->get('phone_number') as $error) 
                   <p class="alert-danger">{{$error}}</p> 
                @endforeach 
    
                @endif
        </div>

  


        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" name="country" class="form-control" required>
         @if($errors->any())
            @foreach ($errors->get('country') as $error) 
               <p class="alert-danger">{{$error}}</p> 
            @endforeach 

            @endif
        </div>

        <button type="submit" class="btn btn-success btn-block buy">Signup</button>
        <p class="register">
            dont have an account?<a href="{{route('login')}}"> login here</a>
        </p>

{{csrf_field()}}
    </form>
</div>
    
</section>





@endsection