<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session; 
use App\Http\Controllers\Report\ReportController;  
 
 
   
Route::get('report/e_profile',[ReportController::class,'e_profile']) ; 
