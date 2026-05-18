<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('items', ItemController::class);
});

// Public home page
Route::get('/', function () {
    return view('welcome');
});

// Old contact form routes (keeping for now)
Route::get('/contact', function () {
    $messages = ContactMessage::latest()->get();
    return view('contact', compact('messages'));
});

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:150'],
        'message' => ['nullable', 'string', 'max:1000'],
    ]);

    ContactMessage::create($validated);

    return redirect('/contact')
        ->with('success', 'Data successfully save ho gaya.');
});
