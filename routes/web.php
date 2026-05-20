<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController; // Vergeet deze import niet!
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// De centrale 'verkeerstoren' route
Route::get('/dashboard', function () {
    $user = Auth::user();

    // Als de user een admin is, sturen we hem door naar de echte admin route
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard'); 
    }

    // Anders is het een normale user en krijgt hij de user view
    // Let op: in mijn eerste bericht noemde ik dit 'user.dashboard', 
    // maar we houden hier jouw 'dashboard' aan (resources/views/dashboard.blade.php)
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');


// =========================================================================
// ADMIN ROUTES GROEP (Alleen toegankelijk voor ingelogde admins)
// =========================================================================
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dit wordt nu: /admin/dashboard (Route-naam: admin.dashboard)
    Route::get('/dashboard', function () {
        return view('admin/dashboard'); 
    })->name('dashboard');

    // Dit maakt automatisch alle routes voor gebruikersbeheer aan:
    // /admin/users          (admin.users.index) -> Lijst tonen
    // /admin/users/create   (admin.users.create) -> Formulier tonen
    // /admin/users          (admin.users.store) -> Opslaan
    // /admin/users/{user}   (admin.users.destroy) -> Verwijderen
    Route::resource('users', UserController::class);
});


// Profiel routes voor iedereen die ingelogd is
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';