<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('posts', [App\Http\Controllers\PageController::class, 'posts'])->name('posts');
Route::get('posts/{post:slug}', [App\Http\Controllers\PageController::class, 'detailPost'])->name('posts.show');
Route::get('tour', [App\Http\Controllers\PageController::class, 'tour'])->name('tour');
Route::get('search_tour', [App\Http\Controllers\PageController::class, 'search_tour'])->name('search_tour');
Route::get('detail/{departure:id}', [App\Http\Controllers\PageController::class, 'detail'])->name('detail');


Route::get('contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::post('contact', [App\Http\Controllers\PageController::class, 'getEmail'])->name('contact.email');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('region_categories', \App\Http\Controllers\Admin\RegionCategoryController::class);
        Route::resource('provine_categories', \App\Http\Controllers\Admin\ProvineCategoryController::class);
        Route::resource('tours', \App\Http\Controllers\Admin\TourController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::resource('tours.galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('tours.departures', \App\Http\Controllers\Admin\DepartureController::class);
        Route::resource('discounts', \App\Http\Controllers\Admin\DiscountController::class);
    });
    
    Route::resource('settings', \App\Http\Controllers\SettingController::class);
    
});
// Admin
Route::get('orders', [App\Http\Controllers\SettingController::class, 'admin_order'])->name('admin_order');
Route::get('order_detail/{order:id}', [App\Http\Controllers\SettingController::class, 'order_detail'])->name('order_detail');
//User setting profile
Route::get('profiles', [App\Http\Controllers\SettingController::class, 'profile'])->name('auth.profile');
Route::get('profile/setting', [App\Http\Controllers\SettingController::class, 'user_index'])->name('auth.setting');
Route::post('profile/update', [App\Http\Controllers\SettingController::class, 'user_update'])->name('auth.settings.update');
Route::post('profile/setting', [App\Http\Controllers\SettingController::class, 'user_update_password'])->name('auth.settings.update_password');
//User setting Order
Route::get('profile/orders', [App\Http\Controllers\SettingController::class, 'user_order'])->name('auth.order');
Route::get('profile/order/{order:id}', [App\Http\Controllers\SettingController::class, 'user_order_edit'])->name('orders.edit');
Route::put('profile/order/{order:id}', [App\Http\Controllers\SettingController::class, 'user_order_update'])->name('orders.update');


//Admin setting
Route::post('settings', [App\Http\Controllers\SettingController::class, 'update_password'])->name('settings.update_password');
Route::get('settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
//Admin Review
Route::get('admin/review', [App\Http\Controllers\TourReviewController::class, 'index'])->name('admin.reviews.index');
Route::get('admin/review/edit/{review:id}', [App\Http\Controllers\TourReviewController::class, 'edit'])->name('admin.reviews.edit');
Route::put('admin/review/edit/{review:id}', [App\Http\Controllers\TourReviewController::class, 'update'])->name('admin.reviews.update');
Route::delete('admin/review/edit/{review:id}', [App\Http\Controllers\TourReviewController::class, 'destroy'])->name('admin.reviews.destroy');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');

Route::controller(App\Http\Controllers\PageController::class)->group(function () {
    Route::get('/tours', 'package');
    // Route::resource('tours', \App\Http\Controllers\PageController::class);
});

Route::get('/checkout/{departure:id}', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

Route::post('checkout-store/{tour:id}', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

//User review Tour
Route::post('detail/{tour:id}', [App\Http\Controllers\TourReviewController::class, 'user_store_review'])->name('user.review_tour');
Route::post('reply/{review:id}', [App\Http\Controllers\TourReviewController::class, 'reply_review'])->name('user.reply_review');
// Like reivew
Route::post('/like-review', [App\Http\Controllers\LikeReviewController::class, 'toggleLike'])->name('user.like_review');
// User delete comment
Route::delete('review/delete/{review:id}', [App\Http\Controllers\TourReviewController::class, 'delete'])->name('reviews.delete');

Route::get('/discount-checking', [App\Http\Controllers\Admin\DiscountController::class, 'checkDiscount'])->name('checkout_discount');


// Revanue
Route::post('revenue_date', [App\Http\Controllers\Admin\DashboardController::class, 'revenue_date'])->name('revanue.date.post');
Route::get('revenue_date', [App\Http\Controllers\Admin\DashboardController::class, 'revenue_date_get'])->name('revanue.date');

Route::post('revenue_month', [App\Http\Controllers\Admin\DashboardController::class, 'revenue_month'])->name('revenue_month');
Route::post('revenue_year', [App\Http\Controllers\Admin\DashboardController::class, 'revenue_year'])->name('revenue_year');


Route::get('tour_filter/{category}', [App\Http\Controllers\PageController::class, 'tour_filter'])->name('tour_filter');
Route::get('tour_region/{region}', [App\Http\Controllers\PageController::class, 'tour_region'])->name('tour_region');
Route::get('tour_province/{province}', [App\Http\Controllers\PageController::class, 'tour_province'])->name('tour_province');

Route::get('other_day/{tour}', [App\Http\Controllers\PageController::class, 'other_day'])->name('other_day');