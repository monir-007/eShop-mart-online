<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubsubcategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserView\AllUserController;
use App\Http\Controllers\UserView\CartController;
use App\Http\Controllers\UserView\CartPageController;
use App\Http\Controllers\UserView\CashOnController;
use App\Http\Controllers\UserView\IndexController;
use App\Http\Controllers\UserView\LanguageController;
use App\Http\Controllers\UserView\ShippingController;
use App\Http\Controllers\UserView\StripeController;
use App\Http\Controllers\UserView\UserProfileController;
use App\Http\Controllers\UserView\WishlistController;
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

Route::middleware(['auth:admin'])->group(function () {
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

//Admin Profile Route
    Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/profile/store', [ProfileController::class, 'store'])->name('admin.profile.store');

//Admin Password Change
    Route::get('/admin/profile/change-password', [ChangePasswordController::class, 'passwordChange'])->name('admin.change.password');
    Route::post('/admin/profile/update-password', [ChangePasswordController::class, 'passwordUpdate'])->name('admin.update.password');
});
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
Route::get('/user/logout', [UserProfileController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [UserProfileController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store', [UserProfileController::class, 'userStore'])->name('user.profile.store');
Route::get('/user/profile/change-password', [UserProfileController::class, 'userChangePassword'])->name('user.change.password');
Route::post('/user/profile/change-password', [UserProfileController::class, 'userUpdatePassword'])->name('user.change.password.update');

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

Route::prefix('product')->group(function () {
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

/*
Admin Slider Resource Routes
*/

Route::prefix('slider')->group(function () {
    Route::get('/new-slider', [SliderController::class, 'insert'])->name('slider.insert');
    Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/manage', [SliderController::class, 'sliderManage'])->name('slider.manage');
    Route::get('/slider/active/{id}', [SliderController::class, 'sliderStatusActive'])->name('slider.active');
    Route::get('/slider/inactive/{id}', [SliderController::class, 'sliderStatusInactive'])->name('slider.inactive');
});

/*
Admin Slider Resource Routes
*/

Route::prefix('coupons')->group(function () {
    Route::get('/manage-coupons', [CouponController::class, 'couponShow'])->name('coupon.manage');
    Route::post('/store', [CouponController::class, 'couponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
});
/*
Admin Shipping Resource Routes
*/

Route::prefix('shipping')->group(function () {
    Route::get('/manage-division', [ShippingAreaController::class, 'viewShippingDivision'])->name('shipping-division.manage');
    Route::post('/division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');

    Route::get('/manage-district', [ShippingAreaController::class, 'viewShippingDistrict'])->name('shipping-district.manage');
    Route::post('/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

    Route::get('/manage-state', [ShippingAreaController::class, 'viewShippingState'])->name('shipping-state.manage');
    Route::post('/state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'stateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'stateDelete'])->name('state.delete');

});

/*
Multi Language Routes
*/

Route::get('/language/bangla', [LanguageController::class, 'Bangla'])->name('language.bangla');
Route::get('/language/english', [LanguageController::class, 'English'])->name('language.english');

/*
Frontend Product Details Routes
*/
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);

/*
Frontend Subcategories Product  Routes
*/
Route::get('subcategory/products/{id}/{slug}', [IndexController::class, 'SubcategoriesProduct']);
/*
Frontend Subcategories Product  Routes
*/
Route::get('sub-subcategory/products/{id}/{slug}', [IndexController::class, 'SubsubcategoriesProduct']);
/*
Frontend Product Tags Routes
*/
Route::get('/product/tag/{tag}', [IndexController::class, 'productTags']);
/*
Frontend Product View Modal Routes
*/
Route::get('/product/view/modal/{id}', [IndexController::class, 'productShowModal']);
/*
Frontend Add To CART Routes
*/
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);
/*
Frontend Add To Mini CART Routes
*/
Route::get('/product/mini/cart', [CartController::class, 'addToMiniCart']);
/*
Frontend Product Remove from Mini CART Routes
*/
Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveProductMiniCart']);
/*
Frontend Product Wishlist Routes
*/
Route::post('/wishlist/add-to-wishlist/{product_id}', [WishlistController::class, 'addToWishlist']);

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');
    Route::get('/wishlist/get-product', [WishlistController::class, 'getWishlistProduct']);
    Route::get('/wishlist/product/remove/{id}', [WishlistController::class, 'removeWishlistProduct']);
    Route::get('/my/orders', [AllUserController::class, 'myOrders'])->name('my.orders');
    Route::get('/order/details/{orderId}', [AllUserController::class, 'orderDetails']);
});
/*
Frontend My Cart Routes
*/
Route::get('/mycart', [CartPageController::class, 'myCart'])->name('mycart');
Route::get('/mycart/get-product/', [CartPageController::class, 'getMyCartProduct']);
Route::get('/mycart/product/remove/{rowId}', [CartPageController::class, 'removeMyCartProduct']);
Route::get('/mycart/product/increment/{rowId}', [CartPageController::class, 'incrementMyCartProduct']);
Route::get('/mycart/product/decrement/{rowId}', [CartPageController::class, 'decrementMyCartProduct']);

//Frontend Coupon Routes
Route::post('/coupon/apply-code', [CartController::class, 'couponApply']);
Route::get('/coupon/calculation', [CartController::class, 'couponCalculation']);
Route::get('/coupon/remove', [CartController::class, 'couponRemove']);
//Frontend Checkout Routes
Route::get('/checkout', [ShippingController::class, 'checkoutIndex'])->name('checkout');
Route::post('/checkout/store', [ShippingController::class, 'checkoutStore'])->name('checkout.store');
Route::get('/district/get/{id}', [ShippingController::class, 'getDistrict']);
Route::get('/state/get/{id}', [ShippingController::class, 'getState']);

//Payment Routes
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::post('/payment/stripe', [StripeController::class, 'stripePayment'])->name('stripe.payment');
    Route::post('/payment/cash-on-delivery', [CashOnController::class, 'cashOnPayment'])->name('cash.on.delivery.payment');
    });
