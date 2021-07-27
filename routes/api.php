<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function () {

    //group
    Route::group(['prefix' => 'groups'], function ()
    {
        Route::post('{group}', [GroupController::class, 'show']);
        Route::get('{group}', [GroupController::class, 'show']);
    });
});
