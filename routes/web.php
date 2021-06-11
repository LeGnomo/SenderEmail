<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});


Route::post("/recoveryPassword", function(Request $request){
    if(!isset($request->name) || !isset($request->email) || !isset($request->token) ){
        return "Invalid Request";
    }
    Mail::send(new \App\Mail\RecoveryPassword($request->nane,$request->email,$request->token));
    return "true";
});
