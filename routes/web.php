<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Home\HomeController; 
Route::controller(HomeController::class)->group(function () { 
    Route::get('/', 'home_index');  
    Route::get('/about_us', 'about_us');  
});

use App\Http\Controllers\Posts\PostsController; 
Route::controller(PostsController::class)->group(function () { 
    Route::get('post/worker', 'post_worker');    
    Route::get('post/project_owner', 'post_project_owner');    
    Route::get('post/{id}', 'view_post');     
});

@include base_path('routes/auth_route.php');   
@include base_path('routes/upload_route.php'); 
@include base_path('routes/manage_route.php'); 