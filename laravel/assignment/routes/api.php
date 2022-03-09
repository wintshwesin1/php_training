<?php

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

Route::get('/students','API\Student\StudentController@showStudentList');
Route::post('/student/create','API\Student\StudentController@createStudent');
Route::get('/student/{studentId}','API\Student\StudentController@getStudentById');
Route::post('/student/update/{studentId}','API\Student\StudentController@updateStudent');
Route::delete('/student/delete/{studentId}','API\Student\StudentController@deleteStudentById');
