<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AdminController;
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

//Admin Login Route
Route::group(['prefix'=>'admin', 'middleware' => ['admin:admin']], function (){
    Route::get('/login',[AdminController::class, 'loginIndex']);
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

//Admin Profile Route
Route::get('/admin/profile',[ProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/update',[ProfileController::class, 'update'])->name('admin.profile.update');
Route::post('/admin/profile/store',[ProfileController::class, 'store'])->name('admin.profile.store');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
