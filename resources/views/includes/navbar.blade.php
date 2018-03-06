<nav class="navbar navbar-fixed-top navbar-inverse ">
        <div class="container">
          <div class="navbar-brand">
            <big>NVA</big>  <small>KAMPALA</small> 

            <a href="{{route('post.home')}}" class="btn btn-default pull-right"> Home</a>
            <a href="{{route('user.profile')}}" class="btn btn-default pull-right"> Profile</a>
              
          </div>
         
          <div class="userManagement">
         @if(Auth::Check())
              <i class=" fa fa-user pull-right"> 
                  <a href="{{route('user.logout')}}" > Logout</a> </i>

                
       @else
       <i class=" fa fa-user pull-right"> 
          <a href="{{route('user.signup')}}" > Signup</a> </i>

                  <i class=" fa fa-user pull-right"> 
                  <a href="{{route('user.login')}}" > Login</a> </i>

                  @endif   

                  <div class="settings navbar-right">
                      <i class="fa fa-cog"> Settings</i>
                      <ul class="userSettings">
                        {{--  <li >Edit profile</li>  --}}
                        
                        
                      </ul>
                    </div>
 
        </div>

       
        </div>
      </nav>