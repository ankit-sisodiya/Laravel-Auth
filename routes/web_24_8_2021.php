<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserlogsController;
use App\Http\Controllers\TransactioncodeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserAccess;
use App\Http\Controllers\DashboardController;


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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class ,'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/Filter',[DashboardController::class ,'index'])->name('Filter');

Route::middleware(['auth:sanctum', 'verified'])->get('/toner-details', [DashboardController::class, 'toner'])->name('toner_details');
Route::middleware(['auth:sanctum', 'verified'])->get('/cheque-leaf-waste', [DashboardController::class, 'chequeLeafWaste'])->name('cheque_leaf_waste');
Route::middleware(['auth:sanctum', 'verified'])->post('/Toners-Export', [DashboardController::class, 'exportToner'])->name('Toners-Export');
Route::middleware(['auth:sanctum', 'verified'])->post('/Cheque-Leaf-Waste-Export', [DashboardController::class, 'exportChequeLeafWaste'])->name('Cheque-Leaf-Waste-Export');




// ================== Customer Details Routes================

 
Route::middleware(['auth:sanctum', 'verified'],['user:access','true'])->post('customer-details/add',[CustomerController::class, 'store'])->name('customer-store');

Route::middleware(['auth:sanctum', 'verified'])->post('customer-details/edit',[CustomerController::class, 'update'])->name('customer-update');
Route::middleware(['auth:sanctum', 'verified'])->get('customer-details/export',[CustomerController::class, 'export'])->name('customer-export');
Route::middleware(['auth:sanctum', 'verified'])->post('customer-details/import',[CustomerController::class, 'import'])->name('customer-import');

 
// ================== Customer Details Ajax Routes================

Route::middleware(['auth:sanctum', 'verified'])->post('Customer-details/get',[CustomerController::class, 'get'])->name('get-bank-details');


// ==================Bank Details Routes================

Route::middleware(['auth:sanctum', 'verified'])->post('/Bank-details/create', [BankController::class, 'create'])->name('Bank-details/create');
Route::middleware(['auth:sanctum', 'verified'])->post('/Bank-details/import', [BankController::class, 'import'])->name('Bank-details/import');

Route::middleware(['auth:sanctum', 'verified'])->post('/Bank-details/bank-details-update', [BankController::class, 'update'])->name('Bank-details/bank-details-update');
Route::middleware(['auth:sanctum', 'verified'])->get('/Bank-details/ajax-crud-datatable', [BankController::class, 'index'])->name('Bank-details/ajax-crud-datatable');
Route::middleware(['auth:sanctum', 'verified'])->get('Bank-export', [BankController::class, 'bankExport'])->name('Bank-export');;

// ==================Tansaction Code Routes================
Route::middleware(['auth:sanctum', 'verified'])->post('/Tranaction-Code/create', [TransactioncodeController::class, 'create'])->name('Tranaction-Code/create');
Route::middleware(['auth:sanctum', 'verified'])->post('/Tranaction-Code/Tranaction-Code-update', [TransactioncodeController::class, 'update'])->name('Tranaction-Code/Tranaction-Code-update');
Route::middleware(['auth:sanctum', 'verified'])->get('/Tranaction-Code-Export', [TransactioncodeController::class, 'export'])->name('transaction-code-export');


// ==================Users Routes================
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/add', [UsersController::class, 'add'])->name('Users/add');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/create', [UsersController::class, 'create'])->name('Users/create');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/edit/{id}', [UsersController::class, 'add'])->name('Users/edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/Users/update/{id}', [UsersController::class, 'update'])->name('Users/update');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/delete', [UsersController::class, 'destroy'])->name('Users/delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/status', [UsersController::class, 'updateStatus'])->name('Users/status');
Route::middleware(['auth:sanctum', 'verified'])->get('/Change-Password', [UsersController::class, 'changePassword'])->name('Change-Password');
Route::middleware(['auth:sanctum', 'verified'])->post('/Update-Password', [UsersController::class, 'updatePassword'])->name('Update-Password');


// ================== Users Access Routes ================

// Auth::routes();

Route::group(['middleware' => ['auth']],function(){
   
    Route::group(['middleware' => ['user']],function(){
          

    /////////////////////////////////// Bank Protected Routes ///////////////////////////

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Bank-details/add',[BankController::class, 'add'])
                ->name('Bank-details/add');
        
        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Bank-details/view', [BankController::class, 'index'])
                ->name('Bank-details/view');

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Bank-details/bank-details-view',[BankController::class, 'view'])
                ->name('Bank-details/bank-details-view');

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Bank-details/bank-details-edit',[BankController::class, 'edit'])
                ->name('Bank-details/bank-details-edit');

        Route::middleware(['auth:sanctum', 'verified'])
                ->post('/Bank-details/delete-bank-details', [BankController::class, 'destroy'])
                ->name('Bank-details/delete-bank-details');
        

    /////////////////////////////////// Customer Protected Routes ///////////////////////////

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('customer-details/show',[CustomerController::class, 'show'])
                ->name('customer-show');

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('customer-details/view',[CustomerController::class, 'view'])
                ->name('customer-view');

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('customer-details/delete',[CustomerController::class, 'delete'])
                ->name('customer-delete');
        Route::middleware(['auth:sanctum', 'verified'])
                ->get('customer-details/edit',[CustomerController::class, 'edit'])
                ->name('customer-edit');
        Route::middleware(['auth:sanctum', 'verified'])
                ->get('customer-details/add',[CustomerController::class, 'index'])
                ->name('customer-add');
 
    /////////////////////////////////// Transaction Protected Routes ///////////////////////////

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Tranaction-Code/add', [TransactioncodeController::class, 'add'])
                ->name('Tranaction-Code/add');

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Tranaction-Code/Tranaction-Code-view', [TransactioncodeController::class, 'view'])
                ->name('Tranaction-Code/Tranaction-Code-view');
        
        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Tranaction-Code/view', [TransactioncodeController::class, 'index'])
                ->name('Tranaction-Code/view');

        Route::middleware(['auth:sanctum', 'verified'])
                ->get('/Tranaction-Code/Tranaction-Code-edit', [TransactioncodeController::class, 'edit'])
                ->name('Tranaction-Code/Tranaction-Code-edit');

        Route::middleware(['auth:sanctum', 'verified'])
                ->post('/Tranaction-Code/delete', [TransactioncodeController::class, 'destroy'])
                ->name('Tranaction-Code/delete');

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
        





    Route::middleware(['auth:sanctum', 'verified'])->get('/Users/add', [UsersController::class, 'add'])->name('Users/add');
    Route::middleware(['auth:sanctum', 'verified'])->get('logs-report',[UserlogsController::class, 'index'])->name('logs-report');
    Route::get('user-access', [UserAccess::class, 'index'])->name('user-access');


    });
    
});

//==============Users Code Routes================//

Route::middleware(['auth:sanctum', 'verified'])->post('/Users/create', [UsersController::class, 'create'])->name('Users/create');
Route::middleware(['auth:sanctum', 'verified'])->post('/Users/delete', [UsersController::class, 'destroy'])->name('Users/delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/Users/status', [UsersController::class, 'updateStatus'])->name('Users/status');
Route::post('set-user-access', [UserAccess::class, 'create'])->name('set-user-access');
Route::post('auth/user-access', [UserAccess::class, 'userAccess'])->name('get-user-access');
Route::post('update-role-status', [UserAccess::class, 'roleStatus'])->name('update-role-status');


// ==================Orders Routes================
Route::middleware(['auth:sanctum', 'verified'])->post('/Orders/create', [OrderController::class, 'create'])->name('Orders/create');
Route::middleware(['auth:sanctum', 'verified'])->post('/Orders/Update', [OrderController::class, 'update'])->name('Orders/Update');
Route::middleware(['auth:sanctum', 'verified'])->get('/Orders/getDataCustomer', [OrderController::class, 'get_temp_customer_data'])->name('Orders/getDataCustomer');
Route::middleware(['auth:sanctum', 'verified'])->get('/Orders/deleteDataCustomer', [OrderController::class, 'delete_customer_data'])->name('Orders/deleteDataCustomer');
Route::middleware(['auth:sanctum', 'verified'])->get('/Orders/Status', [OrderController::class, 'status'])->name('Orders/Status');
Route::middleware(['auth:sanctum', 'verified'])->get('/Orders/Export', [OrderController::class, 'export'])->name('order-export');
Route::middleware(['auth:sanctum', 'verified'])->get('/Orders/Submit/Export', [OrderController::class, 'submitExport'])->name('order-submit-export');

Route::middleware(['auth:sanctum', 'verified'])->get('Get-Customers',[OrderController::class, 'getCustomers'])->name('Get-Customers');
// ================================== logs export ====================================

    Route::middleware(['auth:sanctum', 'verified'])->post('logs-export',[UserlogsController::class, 'export'])->name('logs-export');
    Route::middleware(['auth:sanctum', 'verified'])->get('get-logs',[UserlogsController::class, 'get'])->name('get-logs');

    




