@extends('layouts.master')


@section('content')


<section class="signup">
   
    <h3 class="text-center">Sign up</h3>
    <hr>
<div class="signupForm col-md-4 col-md-offset-4">
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

        <button type="submit" class="btn btn-success btn-block buy">Signup</button>
        <p class="register">
            dont have an account?<a href="{{route('user.getLogin')}}"> login here</a>
        </p>

{{csrf_field()}}
    </form>
</div>
    
</section>





@endsection