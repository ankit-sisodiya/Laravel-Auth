<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserAccess;
use App\Http\Controllers\DashboardController;
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
Route::get('/', function () { return view('auth/login'); });
Route::get('reset-password', function () { return view('auth/reset-password'); });
Route::post('Otp-Send',[UsersController::class ,'OtpSend'])->name('Otp-Send');
Route::post('Otp-Verify',[UsersController::class ,'OtpVerify'])->name('Otp-Verify');
Route::post('/Update-Password', [UsersController::class, 'updatePassword'])->name('Update-Password');
Route::get('/error-500',[UsersController::class ,'error500'])->name('error-500');
Route::get('Signout',[UsersController::class ,'signout'])->name('Signout');


Route::middleware(['auth:sanctum', 'verified'])->get('/error-404',[DashboardController::class ,'error404'])->name('error-404');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class ,'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('',[DashboardController::class ,'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/Filter',[DashboardController::class ,'index'])->name('Filter');
Route::middleware(['auth:sanctum', 'verified'])->get('search',[DashboardController::class ,'search'])->name('search');

// ==================Users Routes================
Route::middleware(['auth:sanctum', 'verified'])->post('logout',[UsersController::class ,'logout'])->name('logout');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/add', [UsersController::class, 'add'])->name('Users/add');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/create', [UsersController::class, 'create'])->name('Users/create');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/edit/{id}', [UsersController::class, 'add'])->name('Users/edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/Users/update/{id}', [UsersController::class, 'update'])->name('Users/update');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/delete', [UsersController::class, 'destroy'])->name('Users/delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/status', [UsersController::class, 'updateStatus'])->name('Users/status');
Route::middleware(['auth:sanctum', 'verified'])->get('/Change-Password', [UsersController::class, 'changePassword'])->name('Change-Password');



// ================== Users Access Routes ================

// Auth::routes();

Route::group(['middleware' => ['auth']],function(){
   
    Route::group(['middleware' => ['user']],function(){   

    Route::middleware(['auth:sanctum', 'verified'])->get('/Users/add', [UsersController::class, 'add'])->name('Users/add');
    Route::middleware(['auth:sanctum', 'verified'])->get('logs-report',[UserlogsController::class, 'index'])->name('logs-report');
    Route::get('user-access', [UserAccess::class, 'index'])->name('user-access');

    /////////////////////////////////// Orders Protected Routes ////////////////////////////////

    Route::middleware(['auth:sanctum', 'verified'])
    ->get('/Orders/add', [OrderController::class, 'add'])
    ->name('Orders/add');

    Route::middleware(['auth:sanctum', 'verified'])
        ->get('/Orders-edit', [OrderController::class, 'edit'])
        ->name('Orders-edit');

    Route::middleware(['auth:sanctum', 'verified'])
        ->get('/Orders/view', [OrderController::class, 'index'])
        ->name('Orders/view');

    Route::middleware(['auth:sanctum', 'verified'])
        ->get('/Orders/details/{id}',[OrderController::class, 'details'])
        ->name('Orders/details');

    Route::middleware(['auth:sanctum', 'verified'])
        ->post('/Orders/delete-orders', [OrderController::class, 'destroy'])
        ->name('Orders/delete-orders');

    Route::middleware(['auth:sanctum', 'verified'])
        ->post('Orders/import',[OrderController::class, 'import'])
        ->name('orders-import');

    });
    
});

//==============Users Code Routes================//

Route::middleware(['auth:sanctum', 'verified'])->post('/Users/create', [UsersController::class, 'create'])->name('Users/create');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/delete', [UsersController::class, 'destroy'])->name('Users/delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/status', [UsersController::class, 'updateStatus'])->name('Users/status');
Route::post('set-user-access', [UserAccess::class, 'create'])->name('set-user-access');
Route::post('auth/user-access', [UserAccess::class, 'userAccess'])->name('get-user-access');
Route::post('update-role-status', [UserAccess::class, 'roleStatus'])->name('update-role-status');


// ================================== logs export ====================================

    Route::middleware(['auth:sanctum', 'verified'])->post('logs-export',[UserlogsController::class, 'export'])->name('logs-export');
    Route::middleware(['auth:sanctum', 'verified'])->get('get-logs',[UserlogsController::class, 'get'])->name('get-logs');

    




