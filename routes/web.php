<?php

use App\Http\Controllers\PostController;
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

Route::get(  '/', function () {
    return view('welcome');

});

// ----------------------------------------------------------------
// 1- Define  a new route for so the user can access it through the browser
// 2- Define a new controller that renders the view
// 3- Define a view that contains list of posts
// 4- Remove any Static HTML data from the view



Route::get(
    '/posts' ,
     PostController::class . '@index')
      -> name( 'posts.index');


Route::get(
    '/posts/create',
     PostController::class . '@create')
      -> name( 'posts.create');

Route::post(
    '/posts',
     PostController::class . '@store')
      -> name( 'posts.store');

Route::get(
    '/posts/{post}/edit',
     PostController::class . '@edit')
      -> name( 'posts.edit');

Route::put(
    '/posts/{post}',
     PostController::class . '@update')
      -> name( 'posts.update');

// /posts/{post} (URL Parameter)
Route::get(
    '/posts/{post}' ,
     PostController::class . '@show')-> 
     name( 'posts.show');


Route::delete(
    '/posts/{post}', 
    PostController::class . '@destroy') 
    -> name( 'posts.destroy');


// 1- Strucure Change for database [Create Table,   Edit column, Delete column]
// 2- Operation on database [insert record, update record, delete record]

// echo test::class;


// Route::get(  '/test', [test::class, 'firstaction']);
// Route::get(  '/hello', [test::class, 'greet']);