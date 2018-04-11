<?php

namespace App\Http\Controllers;

use session;
use App\User;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {     //return $property =response()->json( Property::paginate());
      
       // return response()->json([ 'property' => $property]);
       return view ('home');

    }


    // fetch json properties
    public function getProperties()
    {
        $property = User::join('properties','properties.user_id', 'users.id')
                             ->orderBy('properties.created_at', 'desc')
                    
                              ->paginate(12);
       
         $property2 = User::join('properties','properties.user_id', 'users.id')
                              ->orderBy('properties.created_at', 'desc')->get();
                     
                               
                                  
                     
        return response()->json([ $property,  $property2]);
        
     
        
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
           'property_name'=> 'required| max:100',
           'image'=>'required',
           'description'=>'required|max:224|min:5',
           'price'=> 'required',
           'location'=> 'required'
        ]);
               $property_name = $request->property_name;
               
                $image= $request->file('image');

              
                
               
                    $img=$request->file('image')->getClientOriginalName();
                    
                 $saved = $request->image->storeAs('public/images' ,$img);
                
                 
        
        $property = Property::create([
            'property_name'=> $property_name,
            'description'=> $request->description,
            'property_slug'=> str_slug($property_name, '-'),
            'price' => $request->price,
            'location' => $request->location,
            'image' =>'/public/images/'.$img,
            'user_id' => Auth::id()

        ]);

      


        return response()->json('successfully added property');
    }




    // public function store2(Request $request)
    // {
       
    //     // $this->validate($request,[
    //     //    'property_name'=> 'required| max:22',
    //     //    'image'=>'required',
    //     //    'description'=>'required|max:224|min:5',
    //     //    'price'=> 'required',
    //     //    'location'=> 'required'
    //     // ]);
    //            $property_name = $request->property_name;
                  
    //             //  get client name
    //             $img=$request->image->getClientOriginalName();
    //             return response()->json($img);
    //             //    store image
    //              $request->image->storeAs('public/images' ,$img);   
                 
                 
            
    //     // $property = Property::create([
    //     //     'property_name'=> $property_name,
    //     //     'description'=> $request->description,
    //     //     'property_slug'=> str_slug($property_name, '-'),
    //     //     'price' => $request->price,
    //     //     'location' => $request->location,
    //     //     'image' =>'public/images/'.$img,
    //     //     'user_id' => $request->user_id

    //     // ]);

      
    //     session()->flash('success', 'successfully added property');

    //     return response()->json('successfully added property');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $property_slug)
    {
        $property =Property::where('property_slug', $property_slug)->first();
        //return $property;
        $user = User::where('users.id', $property->user_id)->first();
        return view('view')->with(['property'=>$property, 'user' =>  $user]);
    }


    public function showJson($id)
    {
        $property =Property::where('id', $id)->first();
     
        return response()->json($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
             $product = Property::where('id',$id);
             
             $property_name = $request->property_name;
           
                  //get client name 
               $img = $request->file('image')->getClientOriginalName();
                 
            //    store image
                 $request->file('image')->storeAs('public/images',  $img);



            
           
             //update remaining properties  
          $productUpdate =  $product->update([
                
                'property_name'=> $property_name,
                'description'=> $request->description,
                'property_slug'=> str_slug($property_name, '-'),
                'price' => $request->price,
                'location' => $request->location,
                'image'=>'/public/images/'.$img
               
            ]);
        
    
        if($productUpdate){
            return response()->json('successfully updated property');

        }else{
            return response()->json('an error occured ,try again');
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        session()->flash('success', 'successfully deleted property');

        return response()->json('property deleted');
    }
}
