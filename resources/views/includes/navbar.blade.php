


<div>
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="containerBrand">
                    <div class="navbar-brand">
                            
                        <navbar-component :logged_in="'{{Auth::check()}}'"
                          :inbox_url   = "'{{route('user.message', Auth::id())}}'"
                          :profile_url = "'{{Auth::check()?route('user.profile', Auth::user()->slug):''}}'"
                          :logout      = "'{{route('user.logout')}}'"
                          :login       ="'{{route('login')}}'"
                          :signup      ="'{{route('user.getSignup')}}'"
                          :unread       = "'{{Auth::check()?count(Auth::user()->unread()):''}}'" 
                          :home_url     ="'{{route('property.home')}}'"
                        ></navbar-component>
                        <a href="{{route('property.home')}}" class="btn btn-default  homebtn pull-left">Home</a>
                        
                        <h4 class="logoName">PROPERTY MASTERS</h4>
                    
                    </div>
            
        </div>

        {{-- <navbar-component></navbar-component> --}}


        <div class="userNav">
            <ul class="userNavigation">

           <li>
            @if (Auth::check())
            <a href="{{route('user.message', Auth::id())}}" class="btn btn-default userbtn2  pull-right">
                {{-- @if(count(Auth::user()->unread())>0) --}}
                <i class="fa fa-envelope"> <p class="unreadMsg text-danger"> {{count(Auth::user()->unread())}}</p></i>
                {{-- @else --}}
                {{-- <i class="fa fa-envelope"> <p class="unreadMsg"></p></i> --}}
                
                {{-- @endif --}}
            </a>


        </li>

               <li>
                <a href="{{route('user.logout')}}" class="btn btn-default userbtn2  pull-right">Logout</a> 

                 </li>
 
              <li>
                <a href="{{route('user.profile', Auth::user()->slug)}}" class="btn btn-default userbtn  pull-right">Profile</a> 

              </li>
            
            @else
            
            <li>
            <a href="{{route('login')}}" class="btn btn-default userbtn2  pull-right">Login</a>

            </li>

            <li>
            <a href="{{route('user.getSignup')}}" class="btn btn-default userbtn  pull-right">signup</a>

            </li>
            @endif
        </ul>
                
        </div>

    
    
        
        

    </div>
        
            
</nav>




