<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\CategoryController;
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
// Route::delete('Plants/destroy/{id}',[PlantsController::class , 'destroy']);
Route::post('Plants/update/{id}',[PlantsController::class , 'edit']);

Route::post('Signup',[UserController::class , 'signup']);
Route::post('Login',[UserController::class , 'login']);


Route::group(['middleware'=>['auth:sanctum']],function(){
   
   
    Route::middleware(['auth','auth.ADM'])->group(function(){

                Route::post('ADM/Plants',[PlantsController::class , 'create']);
                Route::get('ADM/Plants/{id}',[PlantsController::class , 'show']);
                Route::post('ADM/Plants/update/{id}',[PlantsController::class , 'edit']);
                Route::post('sort/{category}',[PlantsController::class , 'filterByCategory']);

                Route::get('Category/{id}',[CategoryController::class,'getCategory']);
                Route::post('Category/create/',[CategoryController::class,'create']);
                Route::post('Category/edit/{id}',[CategoryController::class,'edit']);
                Route::delete('Category/delete/{id}',[CategoryController::class,'destroy']);
                Route::post('Logout',[UserController::class,'logout']);
                Route::post('userUpdate',[UserController::class , 'updateData']);
                

            });

    Route::middleware(['auth','auth.SELL'])->group(function(){
                Route::post('Plants',[PlantsController::class , 'create']);
                Route::get('Plants/{id}',[PlantsController::class , 'show']);
                Route::post('Plants/update/{id}',[PlantsController::class , 'edit']);
                Route::delete('Plants/destroy/{id}',[PlantsController::class , 'destroy']);
                Route::post('Logout',[UserController::class,'logout']);
                Route::post('userUpdate',[UserController::class , 'updateData']);
                Route::post('sort/{category}',[PlantsController::class , 'filterByCategory']);


    });

 Route::middleware(['auth','auth.USR'])->group(function(){
    Route::post('userUpdate',[UserController::class , 'updateData']);
    Route::get('usr/Plants/{id}',[PlantsController::class , 'show']);
    Route::post('sort/{category}',[PlantsController::class , 'filterByCategory']);

});

});

