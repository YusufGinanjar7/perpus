<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PinjamBukuController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/views/login', [AuthController::class, 'login'])->name('login');
Route::post('/views/login', [AuthController::class, 'autentikasi']);
Route::get('/views/register', [AuthController::class, 'register'])->name('register');
Route::post('/views/register', [AuthController::class, 'createUser']);


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/views/index', [IndexController::class, 'index'])->name('index');
    Route::get('/views/daftarbuku', [BookController::class, 'index'])->name('daftarbuku'); // Hanya gunakan satu rute
    Route::post('/wishlist/add/{bookId}', [BookController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{bookId}', [BookController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('/wishlist', [BookController::class, 'showWishlist'])->name('wishlist.show');
    Route::get('/views/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/views/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/views/pinjam-buku', [PinjamBukuController::class, 'pinjamBuku'])->name('pinjam.buku');
    Route::post('/views/pinjam-buku', [PinjamBukuController::class, 'store'])->name('pinjam.buku.store');
    Route::get('/search-book', [PinjamBukuController::class, 'search'])->name('search.book');
    Route::get('/views/terms', [TermsController::class, 'show'])->name('terms.show');
    Route::get('/views/riwayat', [RiwayatController::class, 'show'])->name('riwayat.show');
    Route::get('/views/wishlist', [WishlistController::class, 'index'])->name('wishlist.show');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::get('/views/news', [NewsController::class, 'showNews'])->name('news.show');
    Route::get('/views/detailbuku/{id}', [BookController::class, 'show'])->name('book.show');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/dashboard/books', [DashboardController::class, 'books'])->name('dashboard.books');
    Route::get('/dashboard/loans', [DashboardController::class, 'loans'])->name('dashboard.loans');

    // Tambahan untuk fitur edit dan delete
    Route::put('/dashboard/users/{user}', [DashboardController::class, 'updateUser'])->name('dashboard.users.update');
    Route::delete('/dashboard/users/{user}', [DashboardController::class, 'deleteUser'])->name('dashboard.users.delete');
    Route::get('/dashboard/users/{user}', [DashboardController::class, 'getUser']);
    Route::get('/dashboard/users/{id}', [DashboardController::class, 'show'])->name('dashboard.users.show');

    //tambahkan buku
    Route::post('/dashboard/books', [DashboardController::class, 'addBook'])->name('books.store');
    Route::delete('/dashboard/books/{id}', [DashboardController::class, 'destroy'])->name('books.destroy');
    Route::put('/dashboard/books/update/{id}', [DashboardController::class, 'update'])->name('books.update');

    //loans
    Route::put('/dashboard/loans/{id}', [DashboardController::class, 'updateLoanStatus'])->name('dashboard.loans.update');
});

Route::get('/profile', function () {
    return auth()->user()->username;
})->middleware('verified');

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/views/index');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::post('/email/verification-notification', function (Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
