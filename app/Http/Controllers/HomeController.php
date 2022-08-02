<?php

namespace App\Http\Controllers;

use App\Models\businesscard;
use App\Models\User;
use App\Models\work;
use App\Models\Report;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $work = work::count();
        $card = businesscard::count();
        $report = Report::count();
        if(auth()->user()->role == 'user'){
            return view('home');
        }else{
            return view('admin/admin-dashboard' , compact('user' , 'work' ,'card' ,'report'));
        }
    }
    public function showReport()
    {
        $reports = Report::all();
        return view('admin.reports' , compact('reports'));
    }
}
