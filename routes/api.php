<?php

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

Route::middleware('api')->group(function () {
    Route::get('post/{postId}/comments', 'CommentController@index')->where('id', '\d+');
    Route::post('post/{postId}/leave-comment', 'CommentController@store')->where('id', '\d+');
});
