<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WannaVisitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|*/

Route::get('/', function () {
    return view('auth/login');
});

//Route::get('/dashboard', function () {
//  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Controllers for PostController
Route::resource('/post', PostController::class)
->middleware(['auth']);

// routing to like/unlike function (wanna visit function)
Route::get('/post/wannavisit/{post}', [WannaVisitController::class, 'wannavisit'])->name('wannavisit');
Route::get('/post/un_wannavisit/{post}', [WannaVisitController::class, 'un_wannavisit'])->name('un_wannavisit');



require __DIR__.'/auth.php';


/*
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', PostController::class);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

// to route to post/create
Route::get('post/create', [PostController::class, 'create'])
-> middleware(['verified'])
-> name('post.create');

// to route to post store to post title and body
Route::post('post', [PostController::class, 'store'])
-> middleware(['verified'])
-> name('post.store');

Route::get('post', [PostController::class, 'index'])
-> name('post.index');

Route::get('post/show/{post}', [PostController::class, 'show'])
-> name('post.show');

// router to edit
Route::get('post/{post}/edit', [PostController::class, 'edit'])
-> middleware(['verified'])
-> name('post.edit');

Route::patch('post/{post}', [PostController::class, 'update'])
-> middleware(['verified'])
-> name('post.update');

// router for delete
Route::delete('post/{post}', [PostController::class, 'destroy'])
-> middleware(['verified'])
-> name('post.destroy');

Route::middleware('verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

*/