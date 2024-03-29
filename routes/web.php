<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EmailLoginController;
use App\Http\Controllers\MyRefundController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\InjectLocale;



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

Route::middleware([InjectLocale::class])->group(function () {
    Route::get('/', [EmailLoginController::class, 'index'])->name('index');

    Route::get('/mail', function (Request $request) {

        return view('mails.submit-confirmation', []);
    });

    Route::get('/welcome', [EmailLoginController::class, 'showWelcomePage'])->middleware(['guest'])->name('welcome');
    Route::get('/verify', [EmailLoginController::class, 'showVerificationPage'])->middleware(['guest'])->name('verify');
    Route::post('/verify', [EmailLoginController::class, 'sendAuthenticationVerification'])->middleware(['guest'])->name('verify.post');

    Route::get('/check-mail', [EmailLoginController::class, 'showCheckMailPage'])->middleware(['guest'])->name('check-mail');

    Route::get('/my-refund', [MyRefundController::class, 'index'])->middleware(['auth'])->name('my-refund');
    Route::post('/my-refund', [MyRefundController::class, 'store'])->middleware(['auth'])->name('my-refund.store');

    Route::get('/locale/{locale}', function (Request $request, $locale) {
        return redirect($request->query('redirect-url', '/'));
    })->name('locale');
});

// Login is done by verifying your email (also admin mails)
Route::redirect('/admin/login', '/verify');

Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware(['auth'])->name('logout');
