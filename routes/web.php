<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookkeepingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PersonalTrainerController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SpendingController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/signin-admin', [SignInController::class, 'admin']);

// admin
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/notification-admin', [NotificationController::class, 'admin']);
Route::get('/member', [MemberController::class, 'index']);
Route::get('/packages', [PackagesController::class, 'index']);
Route::get('/promotion', [PromotionController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/bookkeeping', [BookkeepingController::class, 'index']);
Route::get('/contact-admin', [ContactController::class, 'admin']);
Route::get('/personal-trainer-admin', [PersonalTrainerController::class, 'admin']);
Route::get('/spending', [SpendingController::class, 'index']);