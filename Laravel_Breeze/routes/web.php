<?php

use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;

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

/* Home Routes */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* Admin Panel Routes */
Route::get('/admin', [PermissionController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [PermissionController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [PermissionController::class, 'store'])->name('admin.store');
Route::get('/admin{id}/edit', [PermissionController::class, 'edit'])->name('admin.edit');
Route::get('/admin/show', [PermissionController::class, 'show'])->name('admin.show');
Route::put('/admin{id}', [PermissionController::class, 'update'])->name('admin.update');
Route::delete('/admin/destroy', [PermissionController::class, 'destroy'])->name('admin.destroy');

/* Roles Routes */
Route::get('/role',[RoleController::class, 'index'])->name('admin.role.index');
Route::get('/role/create',[RoleController::class, 'create'])->name('role.create');
Route::post('/role/store',[RoleController::class, 'store'])->name('role.store');
Route::get('/role{id}/edit',[RoleController::class, 'edit'])->name('role.edit');
Route::get('/role/show',[RoleController::class, 'show'])->name('role.show');
Route::put('/role{id}',[RoleController::class, 'update'])->name('role.update');
Route::delete('/role/destroy',[RoleController::class, 'destroy'])->name('role.destroy');



// Route::resource('/role', 'RoleController',[
//         'names' => [
//         'index' => 'admin.role.index',

//     ]]);



/* Dashboard Raoutes */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
