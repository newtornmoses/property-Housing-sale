@extends('layouts.master')


@section('content')

<div class="messagesPanel">
        @include('includes.sessionmsg')
        <h5 class="text-center"> You are logged in as {{Auth::user()->name}}</h5>
<div class="messages col-md-8">
    <h4>All Messages</h4> 
           
    <div class="messageMenu">
        <div class="col-md-4">
             <ul class="list-group">
                 <li class="list-group-item menu">
                      Inbox <span><i class="fa fa-envelope text-danger"> {{count($recieved)}}</i></span>
                 </li>

                 <li class="list-group-item menu">
                        Sent <span><i class="fa fa-envelope"> {{count($sent)}}</i></span>
                   </li>


                   <li class="list-group-item menu">
                        Compose New Message <span><i class="fa fa-edit"> </i></span>
                   </li>
             </ul>
        </div>
    </div>
    <div class="card">

            <h4>Inbox <span class="badge">{{count($recieved)}}</span></h4>  
            @if(count($recieved)>0)  
        @foreach ($recieved as $message )
        <li class="list-group-item">
                <i class="fa fa-envelope text-danger"> </i>
            <div class="to">
                <h4>{{$message->name}}</h4>
            </div>
              {{$message->message}}
              <p>{{$message->created_at->diffForHumans()}}</p>
            </li>
        @endforeach
        @else
        <a class="btn btn-dark">No recieved messages </a>
        @endif
       
        <div class="card-body">
    

            
        </div>
    </div>
</div>


<div class="compose col-md-4">
    <form action="{{route('user.messageSend',$user->id)}}" method="post">
            <div class="form-group">
                    <label for="To">Sending To</label>
                   
                    <div class="list-group-item">{{Auth::id() != $user->id? $user->name:''}}</div>
                   
                </div>

        <div class="form-group">
        <label for="message">Compose Message</label>
        <textarea name="message" id="" class="form-control" cols="30" rows="10" placeholder="compose message here"></textarea>
    </div>
        <button type="submit" class="btn btn-dark btn-block">Send</button>
        {{csrf_field()}}
    </form>
</div>

</div>
@endsection