<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::controller(HomeController::class)->group(function()
{
    Route::get('/','welcome')
        ->withoutMiddleware(['auth'])
        ->name('welcome');
    
    Route::get('/home','index')->name('home');
});


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    
Route::get('/posts/{post}',[App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::group(['prefix' => 'admin'], function(){

    Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->except(['index', 'show'])
        ->middleware(['auth','is_admin']);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)
        ->middleware(['auth','is_admin']);
});


Route::view('/about','pages.about')->name('about');

Auth::routes();