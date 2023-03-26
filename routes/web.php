<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

Route::post('comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/delete/{comment}', [CommentController::class, 'delete'])->name('comments.delete');
Route::get('comments/edit/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('comments/update/{comment}', [CommentController::class, 'update'])->name('comments.update');
