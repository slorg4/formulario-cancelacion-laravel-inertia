<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefundOperationController;
use App\Models\RefundOperation;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RefundOperationController::class, 'index'])->name('refundOperation.index');
Route::post('/', [RefundOperationController::class, 'store'])->name('refundOperation.store');

Route::get('/email-preview', function() {
    $refundOperation = RefundOperation::find(15);
    return view('emails.cancellation', ['refundOperation' => $refundOperation]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
