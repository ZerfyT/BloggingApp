<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/latest-posts', 'latestPosts')->name('post.latest');
    // Route::get('/?post={post}', 'postShow')->name('post.show');
    Route::get('/search', 'search')->name('search');
});

Route::middleware('auth')->controller(App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/my-posts', 'myPosts')->name('post.my');
    Route::get('/post/create', 'create')->name('post.create');
    Route::post('/post/create/save', 'store')->name('post.store');
    Route::put('/post/update{post}', 'update')->name('post.update');
    Route::delete('/post/delete/{post}', 'delete')->name('post.delete');
});

Route::resource('posts', App\Http\Controllers\DsController::class);
