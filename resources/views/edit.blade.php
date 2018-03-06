@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <form action="{{route('post.update', $post->id)}}"  method="post">
    <div class="form-group">
       <textarea name="body" class="form-control" cols="30" rows="10" placeholder="your post here">{{$post->body}}</textarea>
       </div>
    
       <div class="form-group">
        <input type="file" name="image" class="form-control" >
        </div>
       <input type="submit" class ="btn btn-warning" value="Say something">
      
       {{csrf_field()}}
       
    </form>
    </div>
@endsection