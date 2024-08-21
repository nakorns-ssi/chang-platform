<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;   
 

 
use App\Http\Controllers\Manage\ManageController; 
Route::controller(ManageController::class)->group(function () { 
    Route::get('/manage', 'manage_index');      
    
});

use App\Http\Controllers\Manage\ProfileController; 
Route::controller(ProfileController::class)->group(function () { 
    Route::get('/manage/profile', 'profile_index');     
    Route::post('/manage/profile/save', 'profile_save');     

    
});

use App\Http\Controllers\Manage\Worker\WorkerController; 
Route::controller(WorkerController::class)->group(function () { 
    Route::get('/worker', 'index'); 
    Route::get('/manage/worker/post', 'worker_post');        
    Route::get('/manage/worker/post/add', 'worker_post_add');      
    Route::post('/manage/worker/post/save', 'worker_post_save');   
    Route::get('/manage/worker/post/edit', 'worker_post_edit');   
 
});

use App\Http\Controllers\Manage\project_owner\Project_ownerController; 
Route::controller(Project_ownerController::class)->group(function () { 
    Route::get('/project_owner', 'index');     
    Route::get('/manage/project_owner/post/add', 'project_owner_post_add');      
    Route::post('/manage/project_owner/post/save', 'project_owner_post_save');   
    Route::get('/manage/project_owner/post', 'project_owner_post');       
 
});

 

 