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
        /* all things about group
         * return one
         * return all
         * update one
         * delete one
         * store one
         */
        Route::get('{group}', [GroupController::class, 'show']);
        Route::get('', [GroupController::class, 'index']);
        Route::put('{group}', [GroupController::class, 'update']);
        Route::delete('{group}', [GroupController::class, 'destroy']);
        Route::post('',[GroupController::class, 'store']);

            /*
             * all things about the contact
             * return one
             * return all
             * update one
             * delete one
             * create one
             */
            Route::get('{group}/{contact}', [ContactController::class, 'show']);
            Route::get('{group}/contact', [ContactController::class, 'getContactofgroup']);
            Route::put('{group}/{contact}', [ContactController::class, 'update']);
            Route::delete('{group}/{contact}', [ContactController::class, 'destroy']);
            Route::post('{group}/contact',[ContactController::class, 'create']);

    });
});
