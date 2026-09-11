<?php

use Illuminate\Support\Facades\Route;

use App\Models\AcademicPresentation;

Route::get('/', function () {
    return view('language-gate');
});

Route::get('/admin-hidden-door', function () {
    return 'Admin hidden door';
});

Route::get('/resume/{locale}', function ($locale) {
    return view('resume', ['locale' => $locale]);
})->where('locale', 'en|fa');

Route::get('/{slug}', function ($slug) {
    $presentation = AcademicPresentation::where('route', $slug)->firstOrFail();
    return $presentation;
});
