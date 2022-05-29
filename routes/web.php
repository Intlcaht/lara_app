<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/register', 'auth.register')->name('register');

//Route::post('/register', [AuthController::class, 'register']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/__clockwork/{request:.+}', function ($request) {
//     $clockwork = Clockwork::init();
//     return new JsonResponse($clockwork->getMetadata($request));
// });

Route::view('/powergrid', 'powergrid-demo');

