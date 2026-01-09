<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
<<<<<<< HEAD
use App\Http\Controllers\Auth\PasswordResetController;
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileMessageController;
use App\Http\Controllers\FavoriteController;
=======
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\UserController;
>>>>>>> d8a97282b9145629dc952d67913417992d407051
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

<<<<<<< HEAD
// Password reset routes
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetController::class, 'showRequestForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
=======
// Password reset routes (using Laravel's built-in)
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
>>>>>>> d8a97282b9145629dc952d67913417992d407051
});

// Public routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Profile routes (public view, authenticated edit)
Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
<<<<<<< HEAD
    
    // Profile messages
    Route::post('/profiles/{user}/messages', [ProfileMessageController::class, 'store'])->name('profile-messages.store');
    Route::delete('/profile-messages/{profileMessage}', [ProfileMessageController::class, 'destroy'])->name('profile-messages.destroy');
    
    // Comments
    Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    
    // Favorites (many-to-many relationship)
    Route::post('/news/{news}/favorite', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // News management
    Route::resource('news', NewsController::class)->except(['index', 'show']);
    
    // FAQ management
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faq-items', FaqItemController::class);
    
    // User management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggle-admin');
<<<<<<< HEAD
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Contact messages management
    Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::post('/contact-messages/{contactMessage}/reply', [ContactMessageController::class, 'reply'])->name('contact-messages.reply');
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
});
