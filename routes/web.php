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

use App\Http\Controllers\FeedbackController; 
Route::controller(FeedbackController::class)->group(function () {  
    Route::get('/feedback', 'feedback_index');  
    Route::post('/feedback/save', 'feedback_save');  
});

use App\Http\Controllers\QRController; 
Route::controller(QRController::class)->group(function () { 
    Route::get('/qr/{id}', 'qr_scan');   
});

use App\Http\Controllers\Search\SearchController; 
Route::controller(SearchController::class)->group(function () {  
    Route::get('search/', 'search');     
});

use App\Http\Controllers\Posts\PostsController; 
Route::controller(PostsController::class)->group(function () { 
    Route::get('post/worker', 'post_worker');    
    Route::get('post/project_owner', 'post_project_owner');    
    Route::get('post/{id}/{slug}', 'view_post');      
});

use App\Http\Controllers\Profile\ProfileController; 
Route::controller(ProfileController::class)->group(function () {  
    Route::get('profile/{id}/{slug}', 'profile_index');     
    Route::get('/worker_project/{id}', 'worker_project_view'); 
});

@include base_path('routes/auth_route.php');   
@include base_path('routes/upload_route.php'); 
@include base_path('routes/manage_route.php'); 
@include base_path('routes/report_route.php'); 