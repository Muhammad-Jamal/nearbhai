<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin/user/index',compact('users'));
    }
    public function create()
    {
        return view('admin/user/create');
    }
    function store(Request $request)
    {
        $user = new User;
        $request->validate([
            'email' => 'required|email|unique:users' ,
            'password' =>'required|confirmed'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index');
    }
    function edit(Request $request,$id)
    {
        $user = User::find($id);
        return view('admin/user/edit',compact('user'));

    }
    function update(Request $request,$id)
    {

        $user = User::find($id);
       $request->validate([
            'email' => 'email'
        ]);
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $file_path = asset('Image/'.$filename);
            $user->image= $file_path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = bcrypt($request->password); 
        }

        $user->address = $request->address;
        $user->update();
        $users = User::all();
        if(auth()->user()->role == 'user'){
            return redirect()->route('home');
        }else{
            return redirect()->route('user.index');
        }
        
    }



    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
