<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\userController;
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
    route::group(['prefix' => 'users'], function () {
        /*
         * show all users
         * show a particular user
         * logging
         * create a user
         * edit particular user
         * delete particular user
         */
        route::get('', [userController::class, 'index']);
        route::get('show/{user}', [userController::class, 'show']);
        route::post('login', [userController::class, 'login']);
        route::post('create', [userController::class, 'create']);
        route::put('{user}', [userController::class, 'edit']);
        route::delete('{user}', [userController::class, 'delete']);



            /* all things about group
             * return one
             * return all
             * update one
             * delete one
             * store one
             */
            Route::get('{user_id}/groups/{group}', [GroupController::class, 'show']);
            Route::get('{user_id}/groups', [GroupController::class, 'index']);
            Route::put('{user_id}/groups/{group}', [GroupController::class, 'update']);
            Route::delete('{user_id}/groups/{group}', [GroupController::class, 'destroy']);
            Route::post('{user_id}/groups', [GroupController::class, 'store']);
            /*
             * all things about the contact
             * return one
             * return all
             * update one
             * delete one
             * create one
             */
            Route::get('{user_id}/groups/{group}/contacts/{contact}', [ContactController::class, 'show']);
            Route::get('{user_id}/groups/{group}/contacts', [ContactController::class, 'getContactofgroup']);
            Route::put('{user_id}/groups/{group}/contacts/{contact}', [ContactController::class, 'update']);
            Route::delete('{user_id}/groups/{group}/contacts/{contact}', [ContactController::class, 'destroy']);
            Route::post('{user_id}/groups/{group}/contacts', [ContactController::class, 'create']);
    });
});
