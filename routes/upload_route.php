<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session; 
use App\Http\Controllers\UploadController;  
 
 
   
Route::get('upload/modal_list',[UploadController::class,'modal_list'])->name('upload.modal_list');
Route::post('upload/save', [UploadController::class,'save'])->name('upload.save');
Route::get('upload/del', [UploadController::class,'del'])->name('upload.del');
Route::get('upload/img/{upload_key}', [UploadController::class,'img_path'])->name('upload.img_path');
