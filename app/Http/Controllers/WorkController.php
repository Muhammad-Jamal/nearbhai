<?php

namespace App\Http\Controllers;

use App\Models\work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->role == 'user'){
            
            $works = $user->works;
        }else{
            $works = work::all();

        }
        return view('frontend.work.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.work.create');
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
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'address'=>'required',
            'country'=>'required',
            'social_link'=>'required',
        ]);
        $data['description'] = $request->description;
        $data['detail'] = $request->detail;
        $data['budget'] = $request->budget;
        $data['user_id'] = $user_id;
        $data['social_link'] = $request->social_link;
        work::create($data);
        return redirect()->route('work.index')->with('success','Work Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(work $work ,$id)
    {
        $work = work::find($id);
        return view('frontend.work.edit',compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, work $work ,$id)
    {
        $work = work::find($id);
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'address'=>'required',
            'country'=>'required',
            'social_link'=>'required',
        ]);
        $data['description'] = $request->description;
        $data['detail'] = $request->detail;
        $data['budget'] = $request->budget;
        $data['social_link'] = $request->social_link;
        $work->update($data);
        return redirect()->route('work.index')->with('success','Work Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(work $work ,$id)
    {
        work::find($id)->delete();
        return redirect()->route('work.index')->with('success','Work Deleted Successfully');
    }
}
