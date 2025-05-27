<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventUserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', [EventUserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/event/register/{id}', [EventUserController::class, 'register'])->name('event.register');
Route::get('/event/history', [EventUserController::class, 'history'])->name('event.history');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('admin/dashboard', [EventController::class, 'index'])->name('admin.dashboard');
});


Route::middleware(['auth', 'admin'])->group(function () {


    Route::get('/admin/event', [EventController::class, 'index'])->name('admin/event');
    Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin/event/create');
    Route::post('/admin/event/save', [EventController::class, 'save'])->name('admin/event/save');
    Route::get('/admin/event/edit/{id}', [EventController::class, 'edit'])->name('admin/event/edit');
    Route::put('/admin/event/edit/{id}', [EventController::class, 'update'])->name('admin/event/update');
    Route::get('/admin/event/delete/{id}', [EventController::class, 'delete'])->name('admin/event/delete');
});



require __DIR__.'/auth.php';
// Route::get('admin/dashboard', [HomeController::class, 'index']);
// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
