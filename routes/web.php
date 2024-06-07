<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RecievablesController;
use App\Http\Controllers\PayablesController;
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
// Routes related to transaction section
Route::get('/add_transaction', [TransactionController::class , 'add_transaction'])->name('add_transaction');
Route::get('/all_transactions', [TransactionController::class , 'all_transactions'])->name('all_transactions');
Route::get('all_received',[TransactionController::class , 'all_received'])->name('all_received');
Route::get('/all_paid',[TransactionController::class , 'all_paid'])->name('all_paid');
Route::get('/delete_transaction/{id}' ,[TransactionController::class , 'delete_transaction'])->name('delete_transaction');
Route::post('/save_transaction',[TransactionController::class,'save_transaction'])->name('save_transaction');


// Routes related to account recievables section
Route::get('/all_recievables', [RecievablesController::class,'view_all_recievables'])->name('all_recievables');
Route::get('/new_receivable' ,[RecievablesController::class, 'new_receivable'])->name('new_receivable');
Route::get('/confirm_receivable/{id}' ,[RecievablesController::class, 'confirm_receivable'])->name('confirm_receivable');
Route::post('/save_new_receivable',[RecievablesController::class, 'save_new_receivable'])->name('save_new_receivable');
Route::post('/save_receivable',[RecievablesController::class, 'save_receivable'])->name('save_receivable');
Route::post('/search_receivable',[RecievablesController::class,'search_receivable'])->name('search_receivable');


// Routes related to account payable sections
Route::get('/all_payables', [PayablesController::class,'view_all_payables'])->name('all_payables');
Route::get('/new_payable' ,[PayablesController::class, 'new_payable'])->name('new_payable');
Route::get('/confirm_payable/{id}' ,[PayablesController::class, 'confirm_payable'])->name('confirm_payable');
Route::post('/save_new_payable',[PayablesController::class, 'save_new_payable'])->name('save_new_payable');
Route::post('/save_payable',[PayablesController::class, 'save_payable'])->name('save_payable');
Route::post('/search_payable',[PayablesController::class,'search_payable'])->name('search_payable');

// Routes related to personal expense section

// Routes related to user master