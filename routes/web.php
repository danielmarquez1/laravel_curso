<?php

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
    return view('customer.template');
})->name('site');


//**START DASHBOARD **/

// View of the login form 
Route::get('/backend/login', function () {
    return view('auth.login');
})->name('authentication');

//View of the form create administrators 
Route::get('/backend/administrators', function () {
    return view('auth.register');
})->name('administrators')->middleware('auth');;

//view admins 
Route::get('/backend/administrators/show', function () {
    return view('dashboard.pages.admin.show');
})->name('showadmin');


//display administrator information 
Route::get('/backend/administrators/show', 
'auth\RegisterController@index')->name('showadmin');

//display a specific admin
Route::get('/backend/administrators/update/{id}', 
'auth\RegisterController@show')->name('updateadmin');

//add admin
Route::post('/backend/administrators/register', 
'auth\RegisterController@store')->name('addadmin');

//update admin
Route::patch('/backend/administrators/update/user/{id}', 
'auth\RegisterController@update')->name('updateduser');

//delete admin
Route::delete('/backend/administrators/delete/user/{id}', 
'auth\RegisterController@destroy')->name('deleteuser');

Auth::routes();

//Ruta por defecto por UI 
Route::get('/home', 'HomeController@index')->name('home');

/** END DASHBOARD **/
