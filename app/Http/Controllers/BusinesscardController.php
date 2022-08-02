<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\businesscard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BusinesscardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        if($currentUser->role == 'user'){

            $cards = $currentUser->cards;
        }else{
            $cards = Businesscard::all();

        }
        return view('frontend.businesscard.index',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.businesscard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request->validate([
            'name'=>'required',
            'service'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'country'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        
        if($request->hasfile('image'))
        {
            $name = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/images'), $name);
            $image = $name;
        }
        
        $data['image'] = $name;
        $data['description'] = $request->description;
        $data['detail'] = $request->detail;
        $data['time'] = $request->time;
        $data['user_id'] = $user_id;
        businesscard::create($data);
        return redirect()->route('card.index')->with('success','Card Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\businesscard  $businesscard
     * @return \Illuminate\Http\Response
     */
    public function show(businesscard $businesscard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\businesscard  $businesscard
     * @return \Illuminate\Http\Response
     */
    public function edit(businesscard $businesscard ,$id)
    {
        $card = businesscard::find($id);
        return view('frontend.businesscard.edit',compact('card'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\businesscard  $businesscard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, businesscard $businesscard ,$id)
    {
        $card = businesscard::find($id);
        $data = $request->validate([
            'name'=>'required',
            'service'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'country'=>'required',
            'social_link' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        if($request->hasfile('image'))
        {
            $name = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/images'), $name);
            $image = $name;
        }
        
        $data['image'] = $name;
        
        $data['description'] = $request->description;
        $data['detail'] = $request->detail;
        $data['time'] = $request->time;
        $data['social_link'] = $request->social_link;
        $card->update($data);
        return redirect()->route('card.index')->with('success','Card Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\businesscard  $businesscard
     * @return \Illuminate\Http\Response
     */
    public function destroy(businesscard $businesscard,$id)
    {
        businesscard::find($id)->delete();
        return redirect()->route('card.index')->with('success','Card Deleted Successfully');
    }
    public function suspend(Request $request ,$id){
        $card = businesscard::find($id);
        $card->social_link = $request->suspend;
        $card->update();
        return redirect()->route('card.index')->with('success','Card Suspended Successfully');
    }
    
    public function suspended()
    {
        $cards = businesscard::all();
        return view('frontend.businesscard.suspend',compact('cards'));
    }    
    
}
