<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;   
 

 
use App\Http\Controllers\Manage\ManageController; 
Route::controller(ManageController::class)->group(function () { 
    Route::get('/manage', 'manage_index');
    Route::get('/manage/regis', 'regis_index');
    Route::post('/manage/regis_update', 'regis_update');
    
});

use App\Http\Controllers\Manage\ProfileController; 
Route::controller(ProfileController::class)->group(function () { 
    Route::get('/manage/user_profile', 'user_profile');     
    Route::post('/manage/user_profile/save', 'user_profile_save');     
    Route::post('/manage/user_profile/user_profile_upload_img', 'user_profile_upload_img');     

    
});

use App\Http\Controllers\Manage\Worker\WorkerController; 
Route::controller(WorkerController::class)->group(function () { 
    Route::get('/worker', 'index'); 
    Route::get('/manage/worker/post', 'worker_post');        
    Route::get('/manage/worker/post/add', 'worker_post_add');      
    Route::post('/manage/worker/post/save', 'worker_post_save');   
    Route::get('/manage/worker/post/edit', 'worker_post_edit'); 
    
    Route::get('/manage/worker/worker_profile', 'worker_profile');     
    Route::get('/manage/worker/worker_history', 'worker_history');     
    Route::get('/manage/worker/edit_worker_history/add', 'edit_worker_history');     
    Route::get('/manage/worker/edit_worker_history/edit', 'edit_worker_history');     
    Route::post('/manage/worker/worker_profile_save', 'worker_profile_save');     
});


use App\Http\Controllers\Manage\Project_owner\Project_ownerController; 
Route::controller(Project_ownerController::class)->group(function () { 
    Route::get('/project_owner', 'index'); 
    Route::get('/manage/project_owner/post', 'project_owner_post');        
    Route::get('/manage/project_owner/post/add', 'project_owner_post_add');      
    Route::post('/manage/project_owner/post/save', 'project_owner_post_save');   
    Route::get('/manage/project_owner/post/edit', 'project_owner_post_edit');       
 
});

 

 