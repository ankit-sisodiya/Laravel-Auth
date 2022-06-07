<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserlogsController;
use App\Http\Controllers\TransactioncodeController;
use App\Http\Controllers\UsersController;
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
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ================== Customer Details Routes================
Route::get('Customer-details/add',[CustomerController::class, 'index'])->name('customer-add');
Route::post('customer-details/add',[CustomerController::class, 'store'])->name('customer-store');

Route::get('customer-details/view',[CustomerController::class, 'view'])->name('customer-view');
Route::get('customer-details/show',[CustomerController::class, 'show'])->name('customer-show');

Route::get('customer-details/delete',[CustomerController::class, 'delete'])->name('customer-delete');

Route::get('customer-details/edit',[CustomerController::class, 'edit'])->name('customer-edit');
Route::post('customer-details/edit',[CustomerController::class, 'update'])->name('customer-update');
Route::middleware(['auth:sanctum', 'verified'])->get('Customer-details/add',[CustomerController::class, 'index'])->name('store');
Route::middleware(['auth:sanctum', 'verified'])->post('Customer-details/add',[CustomerController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('Customer-details/view',[CustomerController::class, 'view'])->name('customer-view');
Route::middleware(['auth:sanctum', 'verified'])->get('Customer-details/show',[CustomerController::class, 'show'])->name('customer-show');

Route::middleware(['auth:sanctum', 'verified'])->get('Customer-details/delete',[CustomerController::class, 'delete'])->name('customer-delete');

Route::middleware(['auth:sanctum', 'verified'])->get('Customer-details/edit',[CustomerController::class, 'edit'])->name('customer-edit');
Route::middleware(['auth:sanctum', 'verified'])->post('Customer-details/edit',[CustomerController::class, 'update'])->name('customer-update');


// ================== Customer Details Ajax Routes================

Route::middleware(['auth:sanctum', 'verified'])->post('Customer-details/get',[CustomerController::class, 'get'])->name('get-bank-details');


// ==================Bank Details Routes================
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/add', [BankController::class, 'add'])->name('Bank-details/add');

Route::middleware(['auth:sanctum', 'verified'])->get('logs-report',[UserlogsController::class, 'index'])->name('logs-report');
Route::middleware(['auth:sanctum', 'verified'])->post('/Bank-details/create', [BankController::class, 'create'])->name('Bank-details/create');
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/view', [BankController::class, 'index'])->name('Bank-details/view');
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/bank-details-view', [BankController::class, 'view'])->name('Bank-details/bank-details-view');
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/bank-details-edit', [BankController::class, 'edit'])->name('Bank-details/bank-details-edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/Bank-details/bank-details-update', [BankController::class, 'update'])->name('Bank-details/bank-details-update');
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/ajax-crud-datatable', [BankController::class, 'index'])->name('Bank-details/ajax-crud-datatable');
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/delete-bank-details', [BankController::class, 'destroy'])->name('Bank-details/delete-bank-details');

// ==================Tansaction Code Routes================
Route::middleware(['auth:sanctum', 'verified'])->get('/Tranaction-Code/add', [TransactioncodeController::class, 'add'])->name('Tranaction-Code/add');
Route::middleware(['auth:sanctum', 'verified'])->post('/Tranaction-Code/create', [TransactioncodeController::class, 'create'])->name('Tranaction-Code/create');
Route::middleware(['auth:sanctum', 'verified'])->get('/Tranaction-Code/view', [TransactioncodeController::class, 'index'])->name('Tranaction-Code/view');
Route::middleware(['auth:sanctum', 'verified'])->get('/Tranaction-Code/Tranaction-Code-view', [TransactioncodeController::class, 'view'])->name('Tranaction-Code/Tranaction-Code-view');
Route::middleware(['auth:sanctum', 'verified'])->get('/Tranaction-Code/Tranaction-Code-edit', [TransactioncodeController::class, 'edit'])->name('Tranaction-Code/Tranaction-Code-edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/Tranaction-Code/Tranaction-Code-update', [TransactioncodeController::class, 'update'])->name('Tranaction-Code/Tranaction-Code-update');
Route::middleware(['auth:sanctum', 'verified'])->get('/Tranaction-Code/delete', [TransactioncodeController::class, 'destroy'])->name('Tranaction-Code/delete');

// ==================Tansaction Code Routes================
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/add', [UsersController::class, 'add'])->name('Users/add');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/create', [UsersController::class, 'create'])->name('Users/create');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/delete', [UsersController::class, 'destroy'])->name('Users/delete');



