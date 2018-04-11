<?php

namespace App\Http\Controllers;

use App\User;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

public function getSignup()
{
    return view('users/signup');
}


//get login page
public function getLogin()
{
    return view('users.login');
}


//show

public function profile($id)

{
     $user = User::where('users.slug', $id)->first();
    $property_id = Auth::user()->properties->first()->user_id;

         
    
             
    return view('users.profile')->with(['user'=> $user, 'property_id'=>$property_id]);
       
}

// json profile data
public function jsonprofile($slug)

{
     $user = User::where('users.id', $slug)
     
     ->first()->properties;
    
    

        return response()->json($user);
}

public function getUsers()
{
    $users =User::take(4).get();
    return view('view')->with('users', $users);
}




//login
public function login(Request $request)
{       
    $this->validate($request,[
        'email'=> 'required|email',
        'password'=>'required'
    ]);
    
    $email= $request->input('email');
            $password =$request->input('password');
            $user= Auth::attempt([ 'email'=> $email, 'password'=>$password]);
    if( $user)
    {
           
   return redirect()->route('user.profile' , Auth::user()->slug);
   
    }
    else{
            
        
        $message = 'please check your email or password';
       
       $request->session()->flash('danger', $message);
       
        return redirect()->back();
    }
}


//signup
    public function signup(Request $request)
    {
        $this->validate($request,[
                'name'=> 'required',
                'email' =>'required|unique:users',
                'password' => 'required',
                'country' => 'required'
        ]);

              $name = $request->name;
        $users = User::create([
            'name'=>$name,
            'email' =>$request->email,
            'password'=>bcrypt($request->password),
            'slug' =>str_slug($name, '-'),
            'contact_detail'=> $request->code.$request->phone_number,
            'country' => $request->country
        ]);

        return redirect()->route('property.home');
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('property.home');
    }
}
