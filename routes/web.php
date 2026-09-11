<?php

use Illuminate\Support\Facades\Route;

use App\Models\AcademicPresentation;

Route::get('/', function () {
    return view('language-gate');
});

Route::get('/secure-portal-auth', function () {
    return view('auth.login');
})->name('login');

Route::post('/secure-portal-auth', [App\Http\Controllers\AdminPresentationController::class, 'login'])
    ->middleware('throttle:5,1');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminPresentationController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/presentations', [App\Http\Controllers\AdminPresentationController::class, 'store']);
    Route::put('/admin/presentations/{presentation}', [App\Http\Controllers\AdminPresentationController::class, 'update']);
    Route::delete('/admin/presentations/{presentation}', [App\Http\Controllers\AdminPresentationController::class, 'destroy']);
    Route::post('/admin/presentations/{slug}/upload', [App\Http\Controllers\AdminPresentationController::class, 'uploadImage']);
});

Route::get('/resume/{locale}', function ($locale) {
    return view('resume', ['locale' => $locale]);
})->where('locale', 'en|fa');

Route::get('/{slug}', function ($slug) {
    $presentation = AcademicPresentation::where('route', $slug)->firstOrFail();
    return view('presentation', compact('presentation'));
});
