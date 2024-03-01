<?php

use App\Livewire\Company\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Company\Auth\Register;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Company\VerifyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobShowController;
use App\Livewire\Category;
use App\Livewire\CompanyDashboard;
use App\Livewire\CreateJob;
use App\Livewire\HomePageJobList;
use App\Livewire\JobList;
use App\Livewire\Tags;

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

// Livewire Route
Route::get('/company/register', Register::class)->name('company.register');
 Route::get('/company/login', Login::class)->name('company.login')->middleware('authguardcheck');
Route::get('/company/logout',[CompanyController::class,'logout'])->name('company.logout');

// verify company email
Route::get('company/verify/{token}', [VerifyController::class, 'verifyAccount'])->name('user.verify'); 

// Route::get('company/create',[CompanyController::class,'create'])->name('company.create');
// Route::post('company/register',[CompanyController::class,'register'])->name('company.register');
// Route::get('company/login',[CompanyController::class,'loginView'])->name('company.loginview')->middleware('authguardcheck');
// Route::post('company/login',[CompanyController::class,'login'])->name('company.login');

Route::get('company/dashboard',CompanyDashboard::class)
->middleware('companyredirect')
->name('company.dashboard');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login',[AdminController::class,'loginView'])
->middleware('authguardcheck')
->name('admin.loginview');

Route::post('/admin/login',[AdminController::class,'login'])
->name('admin.login');

Route::post('/admin/logout',[AdminController::class,'logout'])
->name('admin.logout');

Route::middleware('adminredirect')->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])
    ->name('admin.dashboard');

    Route::get('/admin/verified-companies',[CompanyController::class,'verifiedCompanies'])
    ->name('admin.verified.companies');

    Route::put('/admin/verify-company/{company}',[CompanyController::class,'approveCompany'])
    ->name('admin.approve.company');

    Route::get('/admin/approved-companies',[CompanyController::class,'approvedCompanies'])
    ->name('admin.approved.companies');

    Route::get('/admin/all-candidates',[CandidateController::class,'allCandidates'])
    ->name('admin.all.candidates');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('category',Category::class)->name('category')->middleware('adminredirect');
Route::get('tags',Tags::class)->name('tags')->middleware('adminredirect');
Route::get('/home',HomePageJobList::class)->name('home');
Route::get('jobs/create',CreateJob::class)->name('jobs.create')->middleware('companyredirect');
Route::get('company/jobs',JobList::class)->name('companyjobs.index')->middleware('companyredirect');
Route::get('job/{job}',[JobShowController::class,'show'])->name('job.show');
require __DIR__.'/auth.php';
