<?php

use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('index');
});

// App routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/courses', [AppController::class, 'courses'])->name('dashboard.courses');
    Route::post('/dashboard/courses', [AppController::class, 'courses'])->name('dashboard.courses');

    Route::post('create-payment', [PaymentController::class, 'createPayment'])->name('create-payment');
    Route::post('/save-transaction', [PaymentController::class, 'saveTransaction'])->name('save-transaction');
});

// Admin
Route::middleware(['auth', 'role-check'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard.admin.index');
    })->name('admin');
    Route::get('/admin/manage_courses', [AdminController::class, 'manageCourses'])->name('admin.manage_courses');
    Route::post('/admin/delete_courses', [AdminController::class, 'deleteCourses'])->name('admin.delete_courses');
    Route::post('/admin/create_courses', [AdminController::class, 'createCourses'])->name('admin.create_courses');
    Route::get('/admin/kursus/{course}/edit', [AdminController::class, 'editCourses'])->name('admin.edit_courses');
    Route::put('/admin/kursus/{course}', [AdminController::class, 'updateCourses'])->name('admin.update_courses');

    // Excel Management ImportExport Courses routes
    Route::get('/admin/import-courses', [ExcelController::class, 'importCourses'])->name('admin.import_courses');
    Route::post('/admin/import-courses', [ExcelController::class, 'importCourses'])->name('admin.import_courses');
    Route::post('/admin/excel-store-courses', [ExcelController::class, 'storeCourses'])->name('admin.store_courses');
    Route::get('/admin/export-courses', [ExcelController::class, 'exportCourses'])->name('admin.export_courses');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
