<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () { return view('welcome'); });
Route::get('/auth/register', function () { return view('register'); });
Route::get('auth/login', function (){ return view('login'); });
Route::get('/home', [homeController::class, 'showHome'])->name('home');



//register
Route::get('auth/register', [RegisterController::class, 'showRegistForm'])->name('register');
Route::post('auth/register',[RegisterController::class, 'register'])->name('register_form');

//form login
Route::get('auth/login/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google-login');
Route::get('auth/login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('auth/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [loginController::class, 'login']);

//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//reset password 
Route::get('auth/forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->middleware('guest')->name('password-request');
Route::post('auth/forgot-password', [ResetPasswordController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password-reset');

// Form reset password
Route::get('auth/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->middleware('guest')->name('password.reset');
Route::post('auth/reset-password', [ResetPasswordController::class, 'formResetPassword'])->middleware('guest')->name('password.update');


//user harus login sebelum membuka halaman
Route::middleware(['auth'])->group(function () {
    //profile user
    Route::get('about-user/profile/{id}', [userProfileController::class, 'showProfile'])->name('about-user.profile');
    Route::post('about-user/profile/{id}', [userProfileController::class, 'editProfile'])->name('about-user.profile.edit');

    //contact user to admin
    Route::get('about-user/contact', [contactController::class, 'contactPage'])->name('contactPage');
    Route::post('about-user/contact', [contactController::class, 'contactReport'])->name('postReport');



    // ---- SECTION ROUTE USER ---- //


    //route halaman admin
    Route::get('admin/homepage', function (){ return view('admin.homepage'); })->name('home-admin');
    //route category
    Route::post('admin/manage-book/category/postCategory', [categoryController::class, 'newCategory'])->name('postCategory');
    Route::get('admin/manage-book/category', [categoryController::class, 'displaycategory'])->name('categoryPage');
    Route::delete('admin/manage-book/category/{category}', [CategoryController::class, 'delCategory'])->name('deletecategory');
    
    //route Book
    Route::get('admin/manage-book/book', [bookController::class, 'openNewBook'])->name('newbookPage');
    Route::post('admin/manage-book/book', [bookController::class, 'newBook'])->name('addNewBook');
});
















