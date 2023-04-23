<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/show', [IndexController::class, 'show']);

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::delete('/logout', 'destroy')->name('logout');
});

Route::controller(UserAccountController::class)->group(function(){
    Route::get('/register', 'create')->name('register');
    Route::post('/store', 'store')->name('register.store');
});

Route::controller(AdminDashboardController::class)->group(function(){
    Route::get('/admin/panel', 'showAdminPanel')->name('admin.showAdminPanel');
});

Route::controller(StrandsController::class)->group(function(){
    Route::get('/strand/he', 'showHE')->name('strand.showHE');
    Route::get('/strand/ict', 'showICT')->name('strand.showICT');
    Route::get('/strand/ia', 'showIA')->name('strand.showIA');
    Route::get('/strand/smaw', 'showSMAW')->name('strand.showSMAW');
    
});

Route::controller(UserManagementController::class)->group(function(){
    Route::get('/admin/panel/users-all', 'showAllUsers')->name('admin.showAllUsers');
    Route::get('/admin/panel/user-add', 'showAddUser')->name('admin.addUser');
    Route::get('/admin/panel/user-edit', 'showEditUser')->name('admin.editUser');
    Route::delete('/admin/panel/user-delete/{user}', 'userDelete')->name('admin.userDelete');
});