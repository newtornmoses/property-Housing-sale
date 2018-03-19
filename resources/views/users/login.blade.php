@extends('layouts.master')


@section('content')

<section class="login">
    <h3 class="text-center">Login</h3>
    <hr>
<div class="loginForm col-md-4 col-md-offset-4">
    <form action="{{route('user.login')}}" method="post" class="loginForm">

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
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