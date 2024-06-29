<?php

use App\Http\Controllers\pizzaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\publicpizzaController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/order/{pizza}', [publicpizzaController::class, 'show'])->name('public.order.pizza');

Route::middleware('auth')->group(function () {
    Route::resource('/pizza', pizzaController::class);

    Route::patch('/{pizza}', [pizzaController::class, 'update'])->name('update');
    // Route::get('/pizza/{pizza}/edit', [pizzaController::class, 'edit'])->name('pizza.edit');
    // Route::get('/pizzas', [pizzaController::class, 'index'])->name('pizza.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
