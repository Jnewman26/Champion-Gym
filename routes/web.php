<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookkeepingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PersonalTrainerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SpendingController;
use App\Models\PersonalTrainer;
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
Route::get('/signin-member', [SignInController::class, 'member']);

// member
Route::get('/home', [HomeController::class, 'index']);
Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/member', [MemberController::class, 'member']);
Route::get('/membership-member', [MembershipController::class, 'member']);
Route::get('/profile', [ProfileController::class, 'index']);

// admin
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/notification-admin', [NotificationController::class, 'admin']);

// member admin route //
Route::get('/member-admin', [MemberController::class, 'admin'])->name('member');
// member admin add
Route::post('/member-admin', [MemberController::class, 'memberStore']);

// personal trainer route //
// personal trainer admin
Route::get('/personal-trainer', [PersonalTrainerController::class, 'index'])->name('personal-trainer');
// personal trainer add
Route::post('/personal-trainer', [PersonalTrainerController::class, 'personalTrainerStore']);
// personal trainer edit
Route::put('/personal-trainer-edit/{personal_trainer_id}', [PersonalTrainerController::class, 'personalTrainerUpdate']);
Route::get('/personal-trainer-edit/{personal_trainer_id}/edit', [PersonalTrainerController::class, 'personalTrainerShow']);
// personal trainer delete
Route::delete('/personal-trainer-delete/{membership_id}', [PersonalTrainerController::class, 'personalTrainerDelete']);

// memberhsip route //
// membership admin
Route::get('/membership-admin', [MembershipController::class, 'admin'])->name('membership-admin');
// membership add
Route::post('/membership-admin', [MembershipController::class, 'membershipStore']);
// membership edit
Route::put('/membership-edit/{membership_id}', [MembershipController::class, 'membershipUpdate']);
Route::get('/membership-edit/{membership_id}/edit', [MembershipController::class, 'membershipShow']);
// membership delete
Route::delete('/membership-delete/{membership_id}', [MembershipController::class, 'membershipDelete']);

// promotion route //
// promotion
Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion');
// promtoion add
Route::post('/promotion', [PromotionController::class, 'promotionStore']);
// promotion edit
Route::put('/promotion-edit/{promotion_id}', [PromotionController::class, 'promotionUpdate']);
Route::get('/promotion-edit/{promotion_id}/edit', [PromotionController::class, 'promotionShow']);
// promotion delete
Route::delete('/promotion-delete/{promotion_id}', [PromotionController::class, 'promotionDelete']);

// promotion admin //
// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// admin add
Route::post('/admin', [AdminController::class, 'adminStore']);
// admin edit
Route::put('/admin-edit/{admin_id}', [AdminController::class, 'adminUpdate']);
Route::get('/admin-edit/{admin_id}/edit', [AdminController::class, 'adminShow']);
// admin delete
Route::delete('/admin-delete/{admin_id}', [AdminController::class, 'adminDelete']);

Route::get('/bookkeeping', [BookkeepingController::class, 'index']);
Route::get('/contact-admin', [ContactController::class, 'admin']);
Route::get('/spending', [SpendingController::class, 'index']);