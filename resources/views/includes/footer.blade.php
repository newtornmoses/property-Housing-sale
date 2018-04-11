

<div class="col-md-12 col-sm-12 col-xs-12 footer">
                <div class="FooteruserManagement col-md-4   col-sm-12">
                                <h4>PROPERTY MASTERS</h4>
                             
                        <ul class="footerLink ">
                               <li>
                                <a href="{{route('property.home')}}"><i class="fa fa-home"></i> Home</a>
                               </li>

                                @if (Auth::check())
                                <a href="{{route('user.message', Auth::id())}}" >
                                    @if(count(Auth::user()->unread())>0)
                                    <li>
                                    <i class="fa fa-envelope">  Inbox<p class="unreadMsg text-danger"> {{count(Auth::user()->unread())}}</p></i>
                                    </li>
                                    @else
                                      <li>
                                    <i class="fa fa-envelope">  Inbox<p class="unreadMsg"></p></i>
                                </li>
                                    @endif
                               
                                </a>
                                
                                <li>
                                                <a href="{{route('user.logout')}}" > <i class="fa fa-key"></i>Logout</a> 
  
                                </li>

                                <li>
                                                <a href="{{route('user.profile', Auth::user()->slug)}}"> <i class="fa fa-user-circle-o"></i>Profile</a> 

                                </li>
                                
                                @else

                                <li>
                                                <a href="{{route('login')}}" > <i class="fa fa-key"></i> Login</a>

                                </li>
                                
                                <li>
                                                <a href="{{route('user.getSignup')}}" ><i class="fa fa-edit"></i> signup</a>

                                </li>
                                @endif
                        </ul>
                            </div>
                          

  <div  >             

<emailus-component></emailus-component>

</div> 






<div class="col-md-12  col-sm-12 rights mt-4">
                <p class="rights ">
                                &copy; copyright , Property Masters ,All rights reserved 2017
                            </p>
                        
                        
                            <p class="rights pull-right">
                                Developed by newtorn moses
                            </p>
</div>


    </div>

