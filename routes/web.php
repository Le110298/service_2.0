<?php
use App\Http\Controllers\CoorServController;
use App\Http\Controllers\EmpreController;
use App\Http\Controllers\EmplController;
use App\Http\Controllers\ServiController;
use App\Http\Controllers\GrafController;
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

Route::resource('servis', ServiController::class);
Route::resource('empls', EmplController::class);
Route::resource('empres', EmpreController::class);
Route::resource('coor_servs', CoorServController::class);
Route::resource('Modules', GrafController::class);
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
   
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
