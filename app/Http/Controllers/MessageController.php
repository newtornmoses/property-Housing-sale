<?php

namespace App\Http\Controllers;

use session;
use App\User;
use App\messages;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $recieved = messages::where('user_id', Auth::id())
                             
                     ->join('users', 'sender_id','users.id' )
                     ->select('users.name', 'messages.*')
                     ->orderBy('created_at', 'desc')
                                 
        ->get();

             $recievedArray = [];
             foreach($recieved as $msgRecieved){
                 array_push($recievedArray , $msgRecieved);
             }
            //  return $recievedArray;

        $sentArray = [];
        $sent =messages::where('sender_id', Auth::id())
                        ->join('users', 'user_id','users.id' )
                        ->select('users.name', 'messages.*')
                         ->orderBy('created_at', 'desc')
                        ->get();
                   
                   
                  

                   foreach($sent as $sentMessage){
                    array_push($sentArray, $sentMessage);
                   }

                   //array_push($msgArray, $sent);

                  $msgArray= array_merge($recievedArray, $sentArray);
                   
                //   return $msgArray; 
      

        return response()->json(['user' =>$user, 
        'recieved' =>$recieved, 'sent'=>  $sent,
        'msgArray' => $msgArray
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $property_slug)
    {
        $property = Property::where('property_slug',$property_slug)->first();
       $prop= Property::where('property_slug','!=',$property_slug)
                       ->where('user_id', '!=', Auth::id())
                   ->inRandomOrder() ->take(6)->get();
       
        return view('messages')->with(['property' =>$property, 'prop'=>$prop]);
    }

    // public function create($id, $property_slug)
    // {
    //     $user = User::where('id',$id)
    //               ->where('property_slug', $property_slug)->get();
    //     return view('messages')->with('user' ,$user);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $sender = Auth::id();
        $reciever = User::where('id', $id)->first()->id;
       
        
        $message = messages::create([
            'message'=> $request->message,
            'sender_id' => $sender,
            'user_id' => $reciever,
            'property_id'=>$request->property_id
           
        ]);


       

        if($message){
            session()->flash('success', 'message successfully sent ');
            return response()->json('message successfully sent ');

        }else{
            return response()->json('message not sent ');

        }



        
    }



   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $message = messages::find($id);
        $message->update([
            'status' =>1
        ]);

        if($message->status === 1){
            return response()->json('read');
        }else{
            return response()->json('unread');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recievedMsg($reciever)
    {
        $recieved = messages::where('reciever', Auth::id())->get();
        return $recieved;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $message = messages::find($id);
        $message->delete();
        return response()->json('successfully deleted message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function featured($id)
    {
        return \App\Property::where('id','!=',$id)->get();
    }
}
