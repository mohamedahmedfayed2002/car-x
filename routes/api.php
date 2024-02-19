<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\blogsController;
use App\Http\Controllers\Api\feedbackController;
use App\Http\Controllers\Api\centersController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/* part login & register  */
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    Route::resource('Bases', BaseController::class);
});



/*  part blog  */
Route::get('blogs', [blogsController::class, 'index']);
Route::post('blogs', [blogsController::class, 'store']);
Route::get('blogs/{id}', [blogsController::class, 'show']);

/*  part Feedback  */
Route::get('feedback', [feedbackController::class, 'index']);
Route::post('feedback', [feedbackController::class, 'store']);
//Route::get('User/{id}', [UserController::class, 'show']);

/*  part Maintenance centers  */

Route::get('centers', [centersController::class, 'index']);
Route::post('centers', [centersController::class, 'store']);




