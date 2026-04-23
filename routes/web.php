<?php

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $messages = ContactMessage::latest()->get();

    return view('welcome', compact('messages'));
});

Route::post('/', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:150'],
        'message' => ['nullable', 'string', 'max:1000'],
    ]);

    ContactMessage::create($validated);

    return redirect('/')
        ->with('success', 'Data successfully save ho gaya.');
});
