<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //   get signup form
    public function getSignup()
    {
        return view('users/signup');
    }

    //   get signup form
    public function getLogin()
    {
        return view('users/login');
    }



    //profile

    public function profile($slug)
    {   $id = Auth::user()->slug;
        $user = User::where('slug',$slug)
                     ->first();

        return view('users/profile')->with('user' ,$user);
    }

    //signup
    public function signup(Request $request)
    {
        $this->validate($request, [
        'name' =>'required|min:4|max:225',
        'email'=> 'required|email|unique:users',
        'password'=>'required| min:6'
        ]);

        $name = $request->input('name');
      $user =  User::create([
            'name'      =>    $name,
            'slug'      =>    str_slug($name),
            'email'     =>    $request->input('email'),
            'password'  => bcrypt($request->input('password'))
        ]);

            if($user){
                Auth::login($user);
                return view('users/profile')->with('success', 'successfully added as a new user');
            }

    }


    // login

    public function login(Request $request)
    {   $this->validate($request, [
        'email' => 'required|email',
        'password'=> 'required'
    ]);

    if(Auth::attempt(['email' => $request->input('email'), 'password' =>$request->input('password')]))
    {
    return redirect('/');
    }
    $danger ='please check your credentials';
    return redirect()->back()->with(['danger'=> $danger]);
    }


    // logout

    public function logout()
    {
        Auth::logout();
        return redirect()->route('shop.home')->with('success','youve successfully logged out');
    }
}
