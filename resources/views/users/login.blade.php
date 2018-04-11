@extends('layouts.master')


@section('content')


{{-- @if (session('danger'))
{{session('danger')}}
    
@endif --}}
<section class="login">
        @include('includes.sessionmsg')
    <h3 class="text-center">Login</h3>
    <hr>
<div class="loginForm col-md-6 col-sm-12 col-md-offset-4  col-xs-8 col-xs-offset-3 col-sm-offset-3">
    <form action="{{route('user.login')}}" method="post" class="loginForm">

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" required  value="{{old('email')}}">
  
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required value="{{old('password')}}">
       
        </div>

        <button type="submit" class="btn btn-success btn-block buy">Login</button>
        <p class="register">
            dont have an account?<a href="{{route('user.getSignup')}}"> signup here</a>
        </p>

        {{csrf_field()}}
    </form>
</div>
    
</section>





@endsection