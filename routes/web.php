<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideoManageController;
use App\Http\Controllers\AddsManageController;
use App\Http\Controllers\EPaperController;
use App\Http\Controllers\HomeEnglishController;
use App\Http\Controllers\EnglishNewsController;
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

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('category/{id}', [HomeController::class, 'Category']);
Route::get('news_details/{id}', [HomeController::class, 'News']);
Route::get('archive', [HomeController::class, 'Archive']);

Route::get('english', [HomeEnglishController::class, 'index'])->name('english');
Route::get('english/category/{id}', [HomeEnglishController::class, 'Category'])->name('english_category');
Route::get('english/news_details/{id}', [HomeEnglishController::class, 'News'])->name('english_news_details');
Route::get('english/archive', [HomeEnglishController::class, 'Archive'])->name('english_archive');



Route::get('e-paper/{id}', [HomeController::class, 'Epaper']);

// Admin Login
// Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('login.page');
// Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
// Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login.page');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'admin'], function () {
    //Admin Manage
    Route::get('/adminDashboard', [DashbordController::class, 'index'])->name('admin.dashboard');

    Route::resource('basic/info', BasicInfoController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('news/manage', NewsController::class);
    Route::resource('video/manage', VideoManageController::class);
    Route::resource('adds/manage', AddsManageController::class);
    Route::resource('epaper/manage', EPaperController::class);
    Route::resource('english_news_manage', EnglishNewsController::class);

});
