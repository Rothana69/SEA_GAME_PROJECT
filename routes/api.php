<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\TicketController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/list/event',[EventController::class,'index']);
Route::get('/event/{name}',[EventController::class,'show']);
Route::get('/eventDetail/{id}',[EventController::class,'getDetails']);
Route::post('/event',[EventController::class,'store']);
Route::put('/event/{id}',[EventController::class,'update']);
Route::delete('/event/{event}',[EventController::class,'destroy']);


Route::post('/match',[MatchesController::class,'store']);

Route::post('/ticket',[TicketController::class,'store']);
Route::get('/ticket',[TicketController::class,'index']);
