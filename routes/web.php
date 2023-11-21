<?php

/*
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;


|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// to route to resources\views\test.blade.php
Route::get('test', [TestController::class, 'test'])
-> name('test');

// to route to post\create
Route::get('post/create', [PostController::class, 'create'])
-> middleware(['auth'])
-> name('create');

// to route to post store to post title and body
Route::post('post', [PostController::class, 'store'])
-> name('post.store');

Route::get('post', [PostController::class, 'index'])
-> middleware(['auth'])
-> name('post.index');

Route::get('post/show/{post}', [PostController::class, 'show'])
-> name('post.show');

// router to edit
Route::get('post/{post}/edit', [PostController::class, 'edit'])
-> name('post.edit');
Route::patch('post/{post}', [PostController::class, 'update'])
-> name('post.update');

// router for delete
Route::delete('post/{post}', [PostController::class, 'destroy'])
-> name('post.destroy');

require __DIR__.'/auth.php';

*/

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', PostController::class);
Route::resource('/post', PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';