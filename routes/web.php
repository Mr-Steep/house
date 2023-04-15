<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SampleController;
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


require __DIR__.'/auth.php';



Route::middleware('auth')->group(function () {
    Route::get('dashboard/booking', [DashboardController::class, 'booking'])->name('dashboard.booking');
    Route::get('dashboard/habitation', [DashboardController::class, 'habitation'])->name('dashboard.habitation');
    Route::get('dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::get('dashboard/verification', [DashboardController::class, 'verification'])->name('dashboard.verification');
    Route::get('dashboard/message', [DashboardController::class, 'message'])->name('dashboard.message');
    Route::get('dashboard/message/{user}', [DashboardController::class, 'dialog'])->name('dashboard.dialog');

    Route::resource('dashboard', DashboardController::class);
    Route::delete('habitation-all', [HabitationController::class, 'removeAll'])->name('habitation-all');
    Route::get('cancel/{habitation}', [HabitationController::class, 'cancel'])->name('cancel');
    Route::resource('habitation', HabitationController::class);

    Route::post('booking/{booking}/confirm', [BookingController::class, 'confirm'])->name('confirm');
    Route::post('booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('cancel');

    Route::resource('booking', BookingController::class);

    Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::resource('messages', MessagesController::class);
    Route::resource('review', ReviewController::class);



    Route::controller(ImageController::class)->group(function(){
        Route::get('image-upload', 'index');
        Route::post('image-upload', 'store')->name('image.store');
        Route::delete('image-upload/{image}', 'destroy')->name('image.destroy');
    });
});


Route::get('habitation/{habitation}', [HabitationController::class, 'show'])->name('habitation.show');
Route::get('habitation/show-all/{habitation}', [HabitationController::class, 'showAll'])->name('habitation.show-all');


Route::get('/{map?}', [HabitationController::class, 'index'])->name('habitation.index')->where('map', 'map');



