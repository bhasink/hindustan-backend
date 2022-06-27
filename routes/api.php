<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/listing' , [MainController::class,'listing']);
Route::post('/get-course-details' , [MainController::class,'get_course_details']);
Route::post('/filter-data' , [MainController::class,'filter_data']);
Route::post('/course-leads' , [MainController::class,'course_leads']);

