<?php

use App\Http\Controllers\EmailLoginController;
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
    Route::get('/', function (Request $request) {

        return $request->user()
            ? redirect('login')
            : redirect('welcome');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome')/*->middleware(['auth'])*/;

    Route::get('/access', function () {
        return view('access');
    })->name('access')/*->middleware(['auth'])*/;

    Route::post('/access', [EmailLoginController::class, 'authenticateWithEmail']);

    Route::get('/locale/{locale}', function (Request $request, $locale) {
        return redirect($request->query('redirect-url', '/'));
    })->name('locale');
});

require __DIR__.'/auth.php';
