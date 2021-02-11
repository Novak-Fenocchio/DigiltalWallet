<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\incomesReport;
use App\Http\Controllers\stocks;
use App\Http\Controllers\expensesResume;


Route::get('/', [ExpenseReportController::class, 'index']);
Route::resource('Stocks', stocks::class);
Route::resource('expensesResume', expensesResume::class);

Route::resource('ExpenseReport', ExpenseReportController::class);
Route::get('/ExpenseReport/{id}/confirmDelete', [ExpenseReportController::class, 'confirmDelete']);
Route::get('/ExpenseReport/{id}/editExpense', [ExpenseReportController::class, 'editExpense']);

Route::resource('incomesReport', incomesReport::class);
Route::get('/incomesReport/{id}/confirmDelete', [incomesReport::class, 'confirmDelete']);
Route::get('/incomesReport/{id}/editIncome', [incomesReport::class, 'editIncome']);
