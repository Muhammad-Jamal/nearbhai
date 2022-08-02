<?php

namespace App\Http\Controllers;

use App\Models\businesscard;
use App\Models\Report;
use App\Models\User;
use App\Models\work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
    public function index(){
        $cards = businesscard::latest()->get();
        $works = work::latest()->with('user')->get();

        return view('frontend.pages.index',compact('cards' , 'works'));
    }
    public function cardDetail($id){
        
        $cardInfo = businesscard::find($id);
        
        $user = User::where('id' , $cardInfo->user_id)->first();

        return view('frontend.pages.card-detail',compact('cardInfo' ,'user'));
    }
    public function workDetail($id)
    {
        $work = work::find($id);
        return view('frontend.pages.work-detail',compact('work'));
    }
    public function showWork(){
        $works = work::latest()->get();
        return view('frontend.pages.showwork',compact('works'));
    }
    public function report()
    {
        return view('frontend.pages.report');
    }
    public function addReport(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email' ,
            'subject' => 'required',
        ]);
        $report = new Report();
        $report->name = $request->name;
        $report->email = $request->email;
        $report->subject = $request->subject;
        $report->message = $request->message;
        $report->save();
        return redirect()->route('pages.index')->with('success','Report Added Successfully');
    }
    public function serachService(Request $request)
    {
         $cards = DB::table('businesscards')
            ->where('service', 'like', '%'.$request->name.'%')
            ->orWhere('Country', 'like', '%'.$request->country.'%')
            ->get();
            return view('frontend.search.search-result',compact('cards'));
    }
}
