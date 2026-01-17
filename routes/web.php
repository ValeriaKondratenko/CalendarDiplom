<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TypeEventController;
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

    Route::get('organizations', [OrganizationController::class, 'index'])->name('organizations');
    Route::get('organizations/{id}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::patch('organizations/{id}', [OrganizationController::class, 'update'])->name('organization.update');
    Route::get('organizations/create', [OrganizationController::class, 'create'])->name('organizationCreate');
    Route::post('organizations', [OrganizationController::class, 'store'])->name('organization.store');
    Route::delete('organizations/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');

    Route::get('places', [PlaceController::class, 'index'])->name('places');
    Route::get('places/create', [PlaceController::class, 'create'])->name('placeCreate');
    Route::post('places', [PlaceController::class, 'store'])->name('place.store');
    Route::delete('places/{id}', [PlaceController::class, 'destroy'])->name('place.destroy');
    Route::get('places/{id}/edit', [PlaceController::class, 'edit'])->name('place.edit');
    Route::patch('places/{id}', [PlaceController::class, 'update'])->name('place.update');

    Route::get('regions', [RegionController::class, 'index'])->name('regions');
    Route::get('regions/create', [RegionController::class, 'create'])->name('regionCreate');
    Route::post('regions', [RegionController::class, 'store'])->name('region.store');
    Route::delete('regions/{id}', [RegionController::class, 'destroy'])->name('region.destroy');
    Route::get('regions/{id}/edit', [RegionController::class, 'edit'])->name('region.edit');
    Route::patch('regions/{id}', [RegionController::class, 'update'])->name('region.update');

    Route::get('typeEvents', [TypeEventController::class, 'index'])->name('typeEvents');
    Route::get('typeEvents/create', [TypeEventController::class, 'create'])->name('typeEventCreate');
    Route::post('typeEvents', [TypeEventController::class, 'store'])->name('typeEvent.store');
    Route::delete('typeEvents/{id}', [TypeEventController::class, 'destroy'])->name('typeEvent.destroy');
    Route::get('typeEvents/{id}/edit', [TypeEventController::class, 'edit'])->name('typeEvent.edit');
    Route::patch('typeEvents/{id}', [TypeEventController::class, 'update'])->name('typeEvent.update');
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
