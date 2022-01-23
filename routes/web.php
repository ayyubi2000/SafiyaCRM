<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;




Route::middleware(['auth','can:basic-access'])->group(function () {


  

    Route::middleware('can:SeeManagment')->group(function (){
        Route::resource('/permission' , PermissionsController::class);
        // ->middleware('change-permissions');  
        Route::resource('/users' , UsersController::class); 
        Route::resource('/roles' , RolesController::class); 
        Route::resource('/role-users' , RoleUserController::class); 
                    });
    Route::middleware('can:SeeReport')->group(function (){
        Route::get('/best-selling-products' , [ReportsController::class , 'bestSellingProducts'])->name('bestSellingProduct'); 
        Route::get('/best-customers' , [ReportsController::class , 'bestCustomers'])->name('bestCustomers'); 
    });

    Route::resource('/' , DashboardController::class);  
    Route::resource('/purchases' , PurchasesController::class)->middleware('can:SeeSelling'); 
    Route::resource('/products' , ProductsController::class); 
    Route::resource('/customers' , CustomersController::class); 
    Route::get('/activeCustomer' , [CustomersController::class, 'activeCustomer'])->name('activeCustomer'); 
    Route::resource('/notification' , NotificationController::class); 
    Route::get('/customer-birthdays' , [ReportsController::class , 'customerBirthdays'])->name('customerBirthdays'); 
    Route::post('autocomplete', [PurchasesController::class, 'autocomplete'])->name('autocomplete');
    Route::get('sendSms', [PurchasesController::class, 'sendSms'])->name('sendSms')->middleware('can:sms'); 

    Route::get('getByAddverstament/{addverId}' , [CustomersController::class, 'getByAddverstament' ])->name('getByAddverstament');

    Route::get('getByStatus/{statusAmount}' , [CustomersController::class, 'getByStatus' ])->name('getByStatus');
});

require __DIR__.'/auth.php';
