<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PDSController;
use App\Http\Controllers\ApplicantAttachmentController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\Auth\ForceUpdatePasswordController;
use App\Http\Middleware\EnsureSmsTwoFactorIsVerified;
use App\Http\Middleware\SmsTwoFactorIsVerified;
use App\Http\Middleware\EnsurePasswordIsChanged;
use App\Http\Middleware\PasswordChanged;


// force change password
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, PasswordChanged::class])->group(function () {
    Route::get('/force-update-password', [ForceUpdatePasswordController::class, 'index'])->name('force-password.index');
    Route::post('/update-password', [ForceUpdatePasswordController::class, 'update'])->name('force-password.change');
});

// 2fa
Route::middleware(['auth', SmsTwoFactorIsVerified::class])->group(function () {
    Route::get('/two-factor-sms-challenge', [TwoFactorController::class, 'index'])->name('two-factor-sms.index');
    Route::post('/two-factor-sms-send', [TwoFactorController::class, 'sendCode'])->name('two-factor-sms.send');
    Route::post('/two-factor-sms-verify', [TwoFactorController::class, 'verifyCode'])->name('two-factor-sms.verify');
});

// landing page
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// dashboard
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// admin users
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
});

// applications
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::post('/applications/add', [ApplicationController::class, 'store'])->name('applications.store');
    Route::delete('/applications/{id}/delete', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    });

// hr applicants
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicants.index');
    Route::get('/applicants/{id}', [ApplicantController::class, 'show'])->name('applicants.show');
    });


// hr vacancies & qualification matrix
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/vacancies', [VacancyController::class, 'card'])->name('vacancies.card');
    Route::get('/vacancies/list', [VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('/vacancies/{id}', [VacancyController::class, 'show'])->name('vacancies.show');
    Route::get('/vacancies/{id}/notices', [VacancyController::class, 'notices'])->name('vacancies.notices');
    Route::get('/vacancies/{id}/qualification-matrix', [VacancyController::class, 'matrix'])->name('vacancies.matrix');
});

// hr positions
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
    Route::get('/positions/{id}', [PositionController::class, 'show'])->name('positions.show');
});

// hr types
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/types', [TypeController::class, 'index'])->name('types.index');
});

// applicant pds
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/pds', [PDSController::class, 'index'])->name('pds.index');
    Route::get('/pds/{userId}/{applicationId}', [PDSController::class, 'show'])->name('pds.show');
});

// applicant attachments
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/attachments', [ApplicantAttachmentController::class, 'index'])->name('attachments.index');
});

// email templates
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', EnsureSmsTwoFactorIsVerified::class, EnsurePasswordIsChanged::class])->group(function () {
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
});

// secure files from being accessed outside and other users
Route::middleware('auth')->group(function () {
    Route::get('/uploads/vacancies/{filename}', [FileController::class, 'hrShow'])
    ->where('filename', '.*');
    Route::get('/uploads/attachments/{userId}/{type}/{filename}', [FileController::class, 'userShow'])
        ->where('filename', '.*');
});