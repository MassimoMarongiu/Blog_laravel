<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\MessageLikeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// da app/serviceprovider/ metodo boot
//per settare la lingua vedi middleware/setlocale.php e providers/appserviceprovider
// settati dal kernel in middlewaregroups
// cedi app/http/middleware/setlocale
//vedi config/app.php
Route::get('lang/{lang}', function($lang) {
    // dd($lang);
    app()->setLocale($lang);
    session()->put('locale', $lang);
   return redirect()->route('dashboard');
})->name('lang');

//definito da route service provider
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/welcome', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// route grouping
// Route::group(['prefix'=>'messages/','as'=>'messages.'], function () {
// ,'as'=>'messages'

// Route::get('/{message}',[MessageController::class,'show'])->name('show');// ->withoutMiddleware('auth');

// autorizzati
// Route::group(['middleware'=>['auth']], function () {
//     Route::post('/message',[MessageController::class,'store'])->name('store');

//     Route::get('/{message}/edit',[MessageController::class,'edit'])->name('edit');

//     Route::put('/{message}',[MessageController::class,'update'])->name('update');

//     Route::delete('/{message}',[MessageController::class,'destroy'])->name('destroy');

//     Route::post('/{message}/comments',[CommentController::class,'store'])->name('comments.store');
// });
// });

// Per il login guarda routes/auth.php

// alternative route
Route::resource('messages', MessageController::class)->except('index', 'create', 'show')->middleware('auth');

Route::resource('messages', MessageController::class)->only('show');

Route::resource('messages.comments', CommentController::class)->only('store')->middleware('auth');

Route::resource('users', UserController::class)->only('show');
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::get('myprofile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('messages/{message}/like', [MessageLikeController::class, 'like'])->middleware('auth')->name('messages.like');
Route::post('users/{message}/unlike', [MessageLikeController::class, 'unlike'])->middleware('auth')->name('messages.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


// Route::get('/welcome', function () {
//     return view('dashboard');
// });

// Route::get('/welcome', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

// Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware('auth');
// cambia da kernel.php  protected $routeMiddleware = [
// Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth','admin']);

// ADMIN
// da kernel metodo routeMiddleware da can
// vedi providers/authserviceprovider per il gate

// Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class)->only('index');
    Route::resource('messages', AdminMessageController::class)->only('index');
    Route::resource('comments', AdminCommentController::class)->only('index','destroy');
});
Route::post('logout', [AuthController::class, 'logout'])->middleware(('auth'))->name('logout');
