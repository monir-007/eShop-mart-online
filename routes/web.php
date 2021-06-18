<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserView\IndexController;
use App\Models\User;
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

//Admin Password Change
Route::get('/admin/profile/change-password',[ChangePasswordController::class, 'passwordChange'])->name('admin.change.password');
Route::post('/admin/profile/update-password',[ChangePasswordController::class, 'passwordUpdate'])->name('admin.update.password');

/*
User View Routes
*/
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

//User View Index Route
Route::get('/',[IndexController::class, 'index'])->name('home');
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class, 'userStore'])->name('user.profile.store');


