<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;  
 
 

///Auth
use App\Http\Controllers\Auth\AuthController; 


Route::controller(AuthController::class)->group(function () {
    Route::get('auth/login', 'login')->name('auth.login');  
    Route::post('auth/callback', 'callback')->name('auth.callback');
    // Route::get('auth/callback', function () {
    //     return redirect('/auth/login');
    // }); 
    Route::get('auth/logout', 'logout')->name('auth.logout'); 
    
    Route::get('auth/debug', 'debug')->name('auth.debug');
    Route::get('auth/auto/{id}', 'auto')->name('auth.auto');
});
 