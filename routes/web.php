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
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/latest-posts', 'latestPosts')->name('latest-posts');
    Route::get('/{post}', 'postShow')->name('post.show');
    Route::get('/search', 'search')->name('search');

});

Route::middleware('auth')->controller(App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/myposts', 'viewMyPosts')->name('myposts');
    Route::get('/post/create', 'create')->name('post.create');
    Route::post('/post/create/save', 'store')->name('store');
    Route::put('/post/update{post}', 'update')->name('update');
    Route::delete('/post/delete/{post}', 'delete')->name('delete');
});
