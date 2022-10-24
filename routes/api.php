<?php

use App\Http\Controllers\ContactController;
use App\Http\Middleware\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('storeContact', [ContactController::class, 'storeContact']);
Route::get('getContact', [ContactController::class, 'getContact']);
Route::delete('deleteContact/{id}', [ContactController::class, 'deleteContact']);


Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);


Route::group(['middleware' => ['jwt.verify']], function(){
    Route::get('logout', [AuthenticationController::class, 'logout']);
});