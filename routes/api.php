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
Route::group(['prefix' => 'v1'], function ()
{
    //group
    Route::group(['prefix' => 'groups'], function ()
    {
        //return a group
        Route::get('{group}', [GroupController::class, 'show']);
        //return all groups
        Route::get('', [GroupController::class, 'index']);
        //update the group
        Route::put('{group}', [GroupController::class, 'update']);
        //delete the group
        Route::delete('{group}', [GroupController::class, 'destroy']);
        //create a group
        Route::post('',[GroupController::class, 'store']);


            //return a contact
            Route::get('{contact}', [ContactController::class, 'show']);
            //return all contacts
            Route::get('{group}/contact', [ContactController::class, 'getContactofgroup']);
            //update the group
            Route::put('{contact}', [ContactController::class, 'update']);
            //delete the group
            Route::delete('{contact}', [ContactController::class, 'destroy']);
            //create a group
            Route::post('{contact}',[ContactController::class, 'create']);

    });
});
