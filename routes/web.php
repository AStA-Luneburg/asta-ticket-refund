<?php

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

// Route::prefix('{locale}')->group(function ($request, $locale) {
//     App::setLocale($locale);


// });

Route::middleware([InjectLocale::class])->group(function () {
    Route::get('/', [EmailLoginController::class, 'index'])->name('index');

    Route::get('/mail', function (Request $request) {

        return view('mails.submit-confirmation', []);
    });

    Route::get('/welcome', [EmailLoginController::class, 'showWelcomePage'])->name('welcome');
    Route::get('/access', [EmailLoginController::class, 'showAccessPage'])->name('access');
    Route::post('/access', [EmailLoginController::class, 'sendAuthenticationVerification']);

    Route::get('/check-mail', [EmailLoginController::class, 'showCheckMailPage'])->name('check-mail');

    Route::get('/my-refund', [MyRefundController::class, 'index'])->middleware(['auth'])->name('my-refund');
    Route::post('/my-refund', [MyRefundController::class, 'store'])->middleware(['auth'])->name('my-refund.store');

    Route::get('/locale/{locale}', function (Request $request, $locale) {
        return redirect($request->query('redirect-url', '/'));
    })->name('locale');
});

require __DIR__.'/auth.php';
