<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
    <div class="navbar-brand">
        <a href="{{route('shop.home')}}" class="btn btn-default  homebtn">Home</a>
        <a href="{{route('shop.home')}}" class="btn btn-default  homebtn">Profile</a>
        
        <h4 class="brandName">VAXON SHOP</h4>
    </div>
    
    <a href="" class="btn btn-default  pull-right">Login</a>
    <a href="" class="btn btn-default  pull-right">signup</a>
    <a href="{{route('shop.cart')}}" class="  pull-right cart"> Cart <i class="fa fa-shopping-cart"></i>
        @if (Cart::instance('default')->count()>0)
        <span class="badge">{{Cart::instance('default')->count()}}</span>

        @endif
    </a>
    

</div>
    
</nav>

