<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('empployee','EmployeeController@index');
Route::get('/employee',[EmployeeController::class, 'index']);
Route::get('/employee_dept/{dept}',[EmployeeController::class, 'employee_dept']);
Route::get('/load',[EmployeeController::class, 'load']);

