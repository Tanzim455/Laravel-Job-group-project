<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('company/create',[CompanyController::class,'create'])->name('company.create');
Route::post('company/register',[CompanyController::class,'register'])->name('company.register');
Route::get('company/login',[CompanyController::class,'loginView'])->name('company.loginview')->middleware('authguardcheck');
Route::get('company/dashboard',[CompanyController::class,'dashboard'])
->middleware('companyredirect')
->name('company.dashboard');
Route::post('company/login',[CompanyController::class,'login'])->name('company.login');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('adminredirect')->name('admin.dashboard');
Route::get('/admin/login',[AdminController::class,'loginView'])->name('admin.loginview')->middleware('authguardcheck');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
