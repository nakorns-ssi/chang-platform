<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;   
 

 
use App\Http\Controllers\Manage\ManageController; 
Route::controller(ManageController::class)->group(function () { 
    Route::get('/manage', 'manage_index');     

    
});

use App\Http\Controllers\Manage\Worker\WorkerController; 
Route::controller(WorkerController::class)->group(function () { 
    Route::get('/worker', 'index');     

    
});

 

 