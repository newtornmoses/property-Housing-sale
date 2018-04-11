<div class="container">

@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="col-md-4 col-md-offset-2">
    <div class="alert alert-danger">
         {{$error}}
    </div>
</div>

@endforeach
@endif


@if (Session::has('success'))
<div class="col-md-4 col-md-offset-2">
    <div class="alert alert-success">
         {{Session::get('success')}}
    </div>
</div>
    
@endif


@if (Session::has('danger'))
<div class="col-md-4 col-md-offset-4">
    <div class="alert alert-danger">
         {{Session::get('danger')}}
    </div>
</div>
    
@endif

</div>