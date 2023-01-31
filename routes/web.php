<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('posts.index');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'delete')->name('posts.delete');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
});
Route::controller(AccountController::class)->middleware(['auth'])->group(function(){
    Route::get('/accounts','index')->name('accounts.index');
    Route::post('/accounts','store')->name('accounts.store');
    Route::get('/accounts/create','create')->name('accounts.create');
    Route::get('/accounts/{account}', 'show')->name('accounts.show');
    Route::delete('/accounts/{account}', 'delete')->name('accounts.delete');
    Route::get('/change/{account}','change')->name('accounts.change');
    
});


Route::get('/categories/{category}', [CategoryController::class,'categories.index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
