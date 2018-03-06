@extends('layouts.master')
   @section('content')
   @if(Session::has('success'))
   <div class="alert alert-success">
       {{Session::get('success')}}
     </div> 
    @endif
  
  
       <a href="{{route('post.home')}}" class="btn btn-danger">Back to main Page</a>
@if($post)
   <p>{{$post->body}}</p>
       <img src="{{asset('images/'.$post->image)}}" alt="">

       <a href="{{route('post.edit', $post->id)}}" class="btn btn-info">Edit</a>

       <form action="{{route('post.delete', $post->id)}}" method="post">
           <button type="submit" class="btn btn-danger">Delete</button>
           {{csrf_field()}}
       </form>
       
         @endif
            
  
   @endsection
