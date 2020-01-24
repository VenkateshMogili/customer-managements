<?php

use Illuminate\Http\Request;

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

// Route::get('/authors','Author');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/student','ApiController@create');//adding student
Route::get('/students','ApiController@getall');//getting all students
Route::get('/student/{id}','ApiController@getById');//get single student
Route::put('/student/{id}','ApiController@edit');//update student
Route::delete('/student/{id}','ApiController@delete');//delete student

Route::get('/getAuthors','ApiController@getAuthors');
