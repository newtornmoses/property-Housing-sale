<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = Email::create([
                'email'=> $request->email
        ]);

        if($email){
            return response()->json('message sent successfully!! we will get back you soon');
        }else{
            return response()->json('err');
        }
    }

}
