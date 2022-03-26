<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController as AdminDashboard;
use App\Http\Controllers\admin\MitraController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [OrderController::class, 'index']);

Route::middleware('auth')->group(function(){
Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

Route::resource('mitra', MitraController::class);
});

Route::post('order',[OrderController::class, 'store'])->name('order.store'); 
Route::get('/order/success',[OrderController::class, 'success'])->name('order.success');


require __DIR__.'/auth.php';
