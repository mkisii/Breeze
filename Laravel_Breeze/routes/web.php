<?php

use App\Http\Controllers\Admin\PermissionController;
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
Route::get('/admin', [PermissionController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [PermissionController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [PermissionController::class, 'store'])->name('admin.store');
Route::get('/admin{id}/edit', [PermissionController::class, 'edit'])->name('admin.edit');
Route::get('/admin/show', [PermissionController::class, 'show'])->name('admin.show');
Route::post('/admin{id}', [PermissionController::class, 'update'])->name('admin.update');
Route::delete('/admin/destroy', [PermissionController::class, 'destroy'])->name('admin.destroy');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
