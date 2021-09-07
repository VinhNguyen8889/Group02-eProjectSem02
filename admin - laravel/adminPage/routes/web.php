<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminUserController;
use App\HTTP\Controllers\FEAdmin\InformationController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Logout
Route::get('/logout',[AdminUserController::class, 'logout'])->name('admin.logout');

//User Profile
Route::prefix('admin')->group(function(){
    Route::get('/user/profile',[AdminUserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/user/profile/edit',[AdminUserController::class, 'UserProfileEdit'])->name('user.profile.edit');
    Route::post('/user/profile/store',[AdminUserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/password/edit',[AdminUserController::class, 'PasswordEdit'])->name('password.edit');
    Route::post('/user/password/update',[AdminUserController::class, 'PasswordUpdate'])->name('password.update');
});

//Information
Route::prefix('information')->group(function(){
    Route::get('/all',[InformationController::class, 'AllInformation'])->name('all.information');
    Route::get('/add',[InformationController::class, 'AddInformation'])->name('add.information');
    Route::post('/store',[InformationController::class, 'StoreInformation'])->name('store.information');
    Route::get('/edit/{id}',[InformationController::class, 'EditInformation'])->name('edit.information');
    Route::post('/update/{id}',[InformationController::class, 'UpdateInformation'])->name('update.information');
    Route::get('/delete/{id}',[InformationController::class, 'DeleteInformation'])->name('delete.information');
});