<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubsubcategoryController;
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
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginIndex']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

//Admin Profile Route
Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
Route::post('/admin/profile/store', [ProfileController::class, 'store'])->name('admin.profile.store');

//Admin Password Change
Route::get('/admin/profile/change-password', [ChangePasswordController::class, 'passwordChange'])->name('admin.change.password');
Route::post('/admin/profile/update-password', [ChangePasswordController::class, 'passwordUpdate'])->name('admin.update.password');

/*
User View Routes
*/
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

//User View Index Route
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'userStore'])->name('user.profile.store');
Route::get('/user/profile/change-password', [IndexController::class, 'userChangePassword'])->name('user.change.password');
Route::post('/user/profile/change-password', [IndexController::class, 'userUpdatePassword'])->name('user.change.password.update');

/*
Admin Brand Resource Routes
*/
Route::prefix('brand')->group(function () {
    Route::get('/brands', [BrandController::class, 'index'])->name('brand.index');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});

/*
Admin Category Resource Routes
*/
Route::prefix('category')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

    Route::get('/sub-subcategories', [SubsubcategoryController::class, 'index'])->name('sub-subcategory.index');
    Route::get('/subcategories/{categoryId}', [SubsubcategoryController::class, 'getSubcategory']);
    Route::get('/sub-subcategories/{subcategoryId}', [SubsubcategoryController::class, 'getSubsubcategory']);
    Route::post('/sub-subcategories/store', [SubsubcategoryController::class, 'store'])->name('sub-subcategory.store');
    Route::get('/sub-subcategories/edit/{id}', [SubsubcategoryController::class, 'edit'])->name('sub-subcategory.edit');
    Route::post('/sub-subcategories/update/{id}', [SubsubcategoryController::class, 'update'])->name('sub-subcategory.update');
    Route::get('/sub-subcategories/delete/{id}', [SubsubcategoryController::class, 'delete'])->name('sub-subcategory.delete');
});

/*
Admin Product Resource Routes
*/

Route::prefix('product')->group(function (){
    Route::get('/new-product', [ProductController::class, 'insert'])->name('product.insert');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'productManage'])->name('product.manage');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product/image/update', [ProductController::class, 'productImageUpdate'])->name('product.image.update');
    Route::post('/product/thumbnail/update', [ProductController::class, 'productThumbnailUpdate'])->name('product.thumbnail.update');
    Route::get('/product/image/delete/{id}', [ProductController::class, 'productImageDelete'])->name('product.image.delete');
    Route::get('/product/details/{id}', [ProductController::class, 'productDetails'])->name('product.details');
    Route::get('/product/active/{id}', [ProductController::class, 'productStatusActive'])->name('product.active');
    Route::get('/product/inactive/{id}', [ProductController::class, 'productStatusInactive'])->name('product.inactive');
});


