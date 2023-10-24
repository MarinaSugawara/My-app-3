<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NiceController;
use GuzzleHttp\Middleware;
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

Route::get('/',[PostController::class,'index']) 
    ->name('root');

// Auth::routes();


//resourceコントローラー
Route::resource('/post', PostController::class);

//いいねを付ける
Route::resource('posts.nices', NiceController::class)
    ->only(['create'])
    ->middleware('auth');

//いいねを表示するページ
// Route::get('/index',NiceController::class)->name('post.show');
Route::get('/index', [NiceController::class, 'index'])->name('post.show');

// いいねを外す
Route::resource('posts.nices', NiceController::class)
    ->only(['destroy'])
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

Route::resource('posts', PostController::class)
    ->only(['index', 'show']);

Route::resource('posts.comments',CommentController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');


require __DIR__ . '/auth.php';
