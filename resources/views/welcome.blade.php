@extends('layouts.master')

@section('title')
  my cool title here
@endsection


@section('content')
 <h4> SIGN UP</h4>
<div class="col-md-12">
<form action="{{route('blog.post')}}"  method="post">
<div class="form-group">
   <textarea name="body" class="form-control" cols="30" rows="10" placeholder="your post here"></textarea>
   </div>

   <div class="form-group">
    <input type="file" name="image" class="form-control" >
    </div>
   <input type="submit" class ="btn btn-warning" value="Say something">
   {{--  <input type="hidden"  name="_token" value="{{Session::token()}}">  --}}
   {{csrf_field()}}
   
</form>
</div>
<h2></h2>
 
@endsection







