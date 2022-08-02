<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BusinesscardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('wallet/index',[App\Http\Controllers\WalletController::class, 'index'])->name('wallet.index');
Route::post('wallet/store',[App\Http\Controllers\WalletController::class, 'store'])->name('wallet.store');
Route::post('wallet/update/id',[App\Http\Controllers\WalletController::class, 'update'])->name('wallet.update');
Route::get('wallet/delete/{id}',[App\Http\Controllers\WalletController::class, 'destroy'])->name('wallet.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//frontend routes
Route::get('/',[PageController::class,'index'])->name('pages.index');
Route::get('report',[PageController::class,'report'])->name('report');
Route::post('add/report',[PageController::class,'addReport'])->name('addReport');
Route::get('show/report',[App\Http\Controllers\HomeController::class,'showReport'])->name('show.report');
Route::get('allwork',[PageController::class,'showWork'])->name('pages.work');
Route::get('/card-detail/{id}',[PageController::class,'cardDetail'])->name('pages.card.detail');
Route::get('/work-detail/{id}',[PageController::class,'workDetail'])->name('pages.work.detail');
Route::get('/get/serach/result',[PageController::class,'serachService'])->name('get-serach-result');

// Routes for the card crud
Route::group(['prefix' => 'card'],function(){
    Route::get('create',[BusinesscardController::class,'create'])->name('card.create');
    Route::post('store',[BusinesscardController::class,'store'])->name('card.store');
    Route::post('suspend/{id}',[BusinesscardController::class,'suspend'])->name('card.suspend');
    Route::get('suspended',[BusinesscardController::class,'suspended'])->name('card.suspended');
    Route::get('index',[BusinesscardController::class,'index'])->name('card.index');
    Route::get('edit/{id}',[BusinesscardController::class,'edit'])->name('card.edit');
    Route::post('update/{id}',[BusinesscardController::class,'update'])->name('card.update');
    Route::get('delete/{id}',[BusinesscardController::class,'destroy'])->name('card.delete');
});
// Routes for the work crud
Route::group(['prefix' => 'work'],function(){
    Route::get('create',[WorkController::class,'create'])->name('work.create');
    Route::post('store',[WorkController::class,'store'])->name('work.store');
    Route::get('index',[WorkController::class,'index'])->name('work.index');
    Route::get('edit/{id}',[WorkController::class,'edit'])->name('work.edit');
    Route::post('update/{id}',[WorkController::class,'update'])->name('work.update');
    Route::get('delete/{id}',[WorkController::class,'destroy'])->name('work.delete');
});

Route::group(['prefix' => 'user'],function(){
    Route::get('edit-profile',[UserController::class,'edit-profile'])->name('profile.edit');
    Route::get('/index',[UserController::class,'index'])->name('user.index');
    Route::get('/create',[UserController::class,'create'])->name('user.create');
    Route::post('/store',[UserController::class,'store'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    // Route::post('store',[WorkController::class,'store'])->name('work.store');
    // Route::get('index',[WorkController::class,'index'])->name('work.index');
    // Route::get('edit/{id}',[WorkController::class,'edit'])->name('work.edit');
    // Route::post('update/{id}',[WorkController::class,'update'])->name('work.update');
    // Route::get('delete/{id}',[WorkController::class,'destroy'])->name('work.delete');
});

// Route::any('/search',function(){
//     $q = Input::get ( 'q' );
//     $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
//     if(count($user) > 0){

//         return view('frontend/serach/search-result')->withDetails($user)->withQuery ( $q );
//     }
//     else{
//      return view ('frontend/serach/search-result')->withMessage('No Details found. Try to search again !');
//     }
// });

