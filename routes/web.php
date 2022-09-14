<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

//Route::resource('/contact', ContactController::class);
// Main Page 主页

Route::get('/contact', [
    'uses'=> 'App\Http\Controllers\ContactController@index',
    'as' => 'contact.index'
]);
// Create 创造
Route::post('/create', [
    'uses'=> 'App\Http\Controllers\ContactController@create',
    'as' => 'contact.create'
]);
// Search 寻找
Route::post('/show', [
    'uses'=> 'App\Http\Controllers\ContactController@show',
    'as' => 'contact.show'
]);
// Advanced Search / Filter 
Route::post('/filter', [
    'uses'=> 'App\Http\Controllers\ContactController@filter',
    'as' => 'contact.filter'
]);

// Delete
Route::get('/delete/{id}', [
    'uses'=> 'App\Http\Controllers\ContactController@delete',
    'as' => 'contact.delete'
]);

//Step 1 edit
Route::post('/GOEdit', [
    'uses'=> 'App\Http\Controllers\ContactController@GOEdit',
    'as' => 'contact.GOEdit'
]);
// Step 2 Edit
Route::post('/GOEdit2', [
    'uses'=> 'App\Http\Controllers\ContactController@GOEdit2',
    'as' => 'contact.GOEdit2'
]);

// Delete　SQL　where
Route::get('/delete', [
    'uses'=> 'App\Http\Controllers\ContactController@Advdelete',
    'as' => 'contact.Advdelete'
]);

Route::post('/edit/{id}', [
    'uses'=> 'App\Http\Controllers\ContactController@edit',
    'as' => 'contact.edit'
]);



//Route::post('/query', ContactController::class);
