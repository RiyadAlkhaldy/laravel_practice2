<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Bus ;
use App\Mail\DemoMail;
use App\Models\Test;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/set/session', function (){
    session()->put('test','the sesion test');
});
Route::get('/get/session', function (){
    dd(session('test'));
});

Route::get('/send/email', function (){
    $test =  Test::find(1);
    $demoMail = (new DemoMail($test))->onConnection('database');
    Mail::to('riadalkhaldy770@gmail.com')->queue($demoMail);
//    Mail::to('riadalkhaldy770@gmail.com')->later(now()->addSecond(5),new DemoMail($test));
//dispatch(new \App\Jobs\DemoJob());
    return public_path();
});
//
Route::get('/send/batch', function (){
 $batch = Bus::batch([
      new \App\Jobs\DemoJob(),
      new \App\Jobs\DemoJob2(),
  ] )->then(function (\Illuminate\Bus\Batch $batch){
//      dd($batch);
  })->catch(function (\Illuminate\Bus\Batch $batch,Throwable $throwable){
//      dd($batch,$throwable);
  })->finally(function (\Illuminate\Bus\Batch $batch){
      dd($batch->name);
  })->dispatch();
 return $batch->id;
});//
//
//
Route::resource('test',\App\Http\Controllers\TestController::class);
//Route::resource('test',\App\Http\Controllers\TestController::class)->middleware('can:isAdmin');
