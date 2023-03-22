<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\UserController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('Plants',[PlantsController::class , 'create']);
Route::get('Plants/{id}',[PlantsController::class , 'show']);
Route::delete('Plants/destroy/{id}',[PlantsController::class , 'destroy']);
Route::post('Plants/update/{id}',[PlantsController::class , 'edit']);

Route::post('Signup',[UserController::class , 'signup']);
Route::post('Login',[UserController::class , 'login']);


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('Plants',[PlantsController::class , 'create']);
    Route::post('userUpdate',[UserController::class , 'updateData']);

});
