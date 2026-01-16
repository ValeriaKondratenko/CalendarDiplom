<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminUser;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->middleware([IsAdminUser::class])->prefix('admin')->group(function () {
    Route::get('adminPage', [EventController::class, 'adminPage'])->name('adminPage');

    Route::get('events/create', [EventController::class, 'create'])->name('event.create');

    Route::get('adminPage/eventsPage', [EventController::class, 'eventsPage'])->name('eventsPage');


    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name ('event.edit');
    Route::patch('events/{id}', [EventController::class, 'update'])->name ('event.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name ('event.destroy');
//POST-запрос
    Route::post('events', [EventController::class, 'store'])->name('event.store');

    Route::get('users', [LoginController::class, 'users'])->name('users');
    Route::get('users/create', [LoginController::class, 'create'])->name('userCreate');
    Route::post('users', [LoginController::class, 'store'])->name('user.store');
    Route::delete('users/{id}', [LoginController::class, 'destroy'])->name('user.destroy');
});

Route::get('events/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('listPages',[PageController::class,'listPages'])->name('listPages');
Route::get('events', [EventController::class, 'index'])->name('event.index');

Route::get('about', [PageController::class, 'about'])->name('about');

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
})->name('event');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
