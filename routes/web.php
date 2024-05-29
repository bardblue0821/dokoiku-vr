<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WannaVisitController;
use App\Http\Controllers\VisitedController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermOfUseController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IconHeaderController;
use App\Http\Controllers\TechBoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|*/

Route::get('/', [AboutController::class, 'index'])->name('about.index');

/* to route login
Route::get('/', function () {
    return view('about.index');
}); */

//Route::get('/dashboard', function () {
//  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/updateicon/{id}', [IconHeaderController::class, 'update_icon'])->name('profile.updateicon');
    Route::post('/profile/updateheader/{id}', [IconHeaderController::class, 'update_header'])->name('profile.updateheader');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Controllers for PostController
Route::resource('/post', PostController::class)
->middleware(['auth']);

// routing to like/unlike function (wanna visit button)
Route::get('/post/wannavisit/{post}', [WannaVisitController::class, 'wannavisit'])->middleware(['auth'])->name('wannavisit');
Route::get('/post/un_wannavisit/{post}', [WannaVisitController::class, 'un_wannavisit'])->middleware(['auth'])->name('un_wannavisit');

// routing to like/unlike function (visited button)
Route::get('/post/visited/{post}', [VisitedController::class, 'visited'])->middleware(['auth'])->name('visited');
Route::get('/post/un_visited/{post}', [VisitedController::class, 'un_visited'])->middleware(['auth'])->name('un_visited');

// routing to about me
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// routing to term of use
Route::get('/term_of_use', [TermOfUseController::class, 'index'])->name('term_of_use.index');

// routing to photo gallery
Route::resource('/photo', PhotoController::class)
->middleware(['auth']);

// routing to users detail
Route::get('/users/{id}/{info}', [UsersController::class, 'show'])->middleware(['auth'])->name('users.show');

// routing to tech board
Route::resource('tech_board', TechBoardController::class)
->middleware((['auth']));

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
