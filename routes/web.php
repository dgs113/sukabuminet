<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DashboardUserController;
use App\Http\Controllers\Dashboard\PostDashboardController;
use App\Http\Controllers\Dashboard\DashboardVideoController;
use App\Http\Controllers\Dashboard\DashboardCategoryController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/berita', [PostController::class, 'index']);
Route::get('/berita/{post:slug}', [PostController::class, 'show']);
Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
Route::get('/videos', [VideoController::class, 'index']);
Route::get('/video/{video:slug}', [VideoController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//berita
Route::get('/dashboard/berita/create-slug', [PostDashboardController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/berita', PostDashboardController::class)->parameters(['berita' => 'post'])->middleware('auth');

//Video
Route::resource('/dashboard/video', DashboardVideoController::class)->middleware('auth');

// category
Route::get('/dashboard/category/create-slug', [DashboardCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('auth');

// user
Route::put('/dashboard/user/{user:id}/updatepass', [DashboardUserController::class, 'updatePass'])->middleware('auth');
Route::resource('/dashboard/user', DashboardUserController::class)->middleware('auth');

// dashbaord
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
