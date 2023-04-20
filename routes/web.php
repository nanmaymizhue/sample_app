<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/',[BlogController::class,'index']);

Route::resource('blogs',BlogsController::class);

Route::resource('posts',PostController::class);

Route::get('blog',[BlogController::class,'index'])->name('blog.index');

Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');

Route::post('blog/store',[BlogController::class,'store'])->name('blog.store');

Route::get('blog/edit/{blog}',[BlogController::class,'edit'])->name('blog.edit');

Route::post('blog/update/{blog}',[BlogController::class,'update'])->name('blog.update');

Route::post('blog/delete/{blog}',[BlogController::class,'delete'])->name('blog.delete');

Route::get('blog/show/{blog}',[BlogController::class,'show'])->name('blog.show');

Route::get('admin',[AdminController::class,'index'])->name('admin');

Route::get('admin/widget',[AdminController::class,'widget'])->name('admin.widget');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
