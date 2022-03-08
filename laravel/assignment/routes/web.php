<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','StudentController@showStudentList');

Route::get('/students', 'StudentController@showStudentList')->name('students');
Route::get('/student/create', 'StudentController@showStudentCreateView')->name('student.create');
Route::post('/student/store', 'StudentController@submitStudentCreateView')->name('student.store');
Route::get('/student/edit/{studentId}', 'StudentController@showStudentEdit')->name('student.edit');
Route::post('/student/edit/{studentId}', 'StudentController@submitStudentEditView')->name('student.update');
Route::delete('/student/delete/{studentId}', 'StudentController@deleteStudentById')->name('student.destroy');


Route::get('/file-import-export', 'StudentController@fileImportExportView')->name('file-import-export');
Route::post('/file-import', 'StudentController@fileImport')->name('file-import');
Route::get('/file-export', 'StudentController@fileExport')->name('file-export');

Route::post('/', 'StudentController@findSearch')->name('search');