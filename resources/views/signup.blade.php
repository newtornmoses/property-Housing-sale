@extends('layouts.master')

@section('content')
{{--  errors  --}}
<div class="col-md-6 col-md-offset-3">
    @if(count($errors)>0)
      @foreach ($errors->all() as $error )
          <div class="alert alert-danger">
              <h4>{{$error}}</h4>
          </div>
      @endforeach
    @endif
    
    <div class="danger">
            @if(Session::has('danger'))
           
                <div class="alert alert-danger">
                    <h4>{{Session::get('danger')}}</h4>
                </div>
           
          @endif
    </div>
    </div>

<form action="{{route('user.singupPost')}}"  class="col-md-6 col-md-offset-3"  method="post">
    <div class="form-group">
        <label for="Username">User Name:</label>
        <input type="text" name="name" class="form-control" placeholder=" your name here" >
    </div>

    <div class="form-group">
            <label for="Username">Email:</label>
            <input type="text" name="email" class="form-control"  placeholder=" your email here" >
        </div>

    <div class="form-group">
            <label for="email">Password:</label>
            <input type="password" name="password" class="form-control"  placeholder="your password here" >
    </div>

    <div class="form-group">
        <label for="email">Profile Picture:</label>
        <input type="file" name="profile_image" class="form-control">
</div>

      
            <button type="submit" class="btn btn-primary" class="form-control" >Signup</button>
            {{csrf_field()}}
         

</form>

@endsection