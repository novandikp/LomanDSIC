<?php

use App\Http\Controllers\GoogleController;
use App\Http\Livewire\Auth\ForgetPassword;
use App\Http\Livewire\Auth\LoginPage;
use App\Http\Livewire\Auth\RegisterPage;
use App\Http\Livewire\Bugs\BugReport;
use App\Http\Livewire\Bugs\DetailBugReport;
use App\Http\Livewire\Categories\AddCategory;
use App\Http\Livewire\Categories\EditCategory;
use App\Http\Livewire\Categories\ShowCategory;

use App\Http\Livewire\ShowPosts;

use App\Http\Livewire\DashboardAdmin;
use App\Http\Livewire\Donatur\DonaturRegistered;
use App\Http\Livewire\Profile\ProfilePage;
use App\Http\Livewire\Program\AddDonationProgram;
use App\Http\Livewire\Program\ShowDonationProgram;
use App\Http\Livewire\Rewards\AddReward;
use App\Http\Livewire\Rewards\EditReward;
use App\Http\Livewire\Rewards\ShowReward;
use App\Http\Livewire\Staff\AddStaff;
use App\Http\Livewire\Staff\EditStaff;
use App\Http\Livewire\Staff\ShowStaff;
use Illuminate\Support\Facades\Auth;
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

Route::get("google/login", [GoogleController::class, "redirectToGoogle"]);
Route::get("google/callback", [GoogleController::class, "callback"]);
Route::middleware("login")->group(function () {
    Route::get('/login', LoginPage::class);
    Route::get('/register', RegisterPage::class);
    Route::get('/forget/{token}', ForgetPassword::class);
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::prefix('admin')->middleware("staff")->group(function () {
    Route::get('/', DashboardAdmin::class);
    Route::get('/home', DashboardAdmin::class);
    Route::prefix('categories')->group(function () {
        Route::get('/', ShowCategory::class);
        Route::get('/add', AddCategory::class);
        Route::get('/edit/{id}', EditCategory::class);
    });
    Route::prefix('rewards')->group(function () {
        Route::get('/', ShowReward::class);
        Route::get('/add', AddReward::class);
        Route::get('/edit/{id}', EditReward::class);
    });
    Route::prefix('staff')->group(function () {
        Route::get('/', ShowStaff::class);
        Route::get('/add', AddStaff::class);
        Route::get('/edit/{id}', EditStaff::class);
    });
    Route::prefix('program')->group(function () {
        Route::get('/', ShowDonationProgram::class);
        Route::get('/add', AddDonationProgram::class);
        Route::get('/edit/{id}', EditStaff::class);
    });
    Route::prefix('bugs')->group(function () {
        Route::get('/', BugReport::class);
        Route::get('/{id}', DetailBugReport::class);
    });
    Route::get('/profile', ProfilePage::class);
    Route::get('/donatur', DonaturRegistered::class);
});
Route::get('/tes', function () {
    return view('tes');
});
