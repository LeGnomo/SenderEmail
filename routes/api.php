<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/recoveryPassword", function(Request $request){
    if(!isset($request->name) || !isset($request->email) || !isset($request->token) ){
        return "Invalid Request";
    }

    try{
        // return new \App\Mail\RecoveryPassword($request->username,$request->email,$request->token); // Debug

        Mail::send(new \App\Mail\RecoveryPassword($request->username,$request->email,$request->token));
        return "true";
    }catch(Exception $e){
        print_r($e->getMessage());
        return "false";
    }
    // if(Mail::send(new \App\Mail\RecoveryPassword($request->username,$request->email,$request->token))){
    //     return "Email success!";
    // }else{
    //     return "Email Failed";
    // }


});
