<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="crsf-token" content="{{csrf_token()}}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <title> @yield('title')</title>
   
    {{--  <link rel="stylesheet" href="{{asset('bootstrap1/dist/css/bootstrap.min.css')}}">  --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}"> 
  
    
    
     
</head>
<body >
   
       
<div id="app">
    @include('includes.navbar')
    @yield('content')

     @yield('content2')
    @yield('footer')
    @include('includes.footer')

</div>
     
   
  


   
  <script src="{{asset('js/app.js')}}"></script>   
</body>
</html>