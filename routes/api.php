<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Api\ApiController;


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


//Register
Route::post("register",[ApiController::class,"register"]);

//Login
Route::post("login",[ApiController::class,"login"]);

//Logout
Route::post("logout",[ApiController::class,"logout"]);

Route::apiResource('todos', TodoController::class);


