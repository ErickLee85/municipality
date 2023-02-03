<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchAndSortController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/index', [UserController::class, 'workOrders'])->name('workOrder')->middleware('auth');
Route::get('/sort', [SearchandSortController::class, 'filter'])->middleware('auth');
Route::get('/sortManage', [SearchandSortController::class, 'sortManage'])->middleware('auth');
Route::get('/fullWorkOrder/{id}/{customer?}', [UserController::class, 'workOrder'])->middleware('auth');
Route::get('/manage', [SearchandSortController::class, 'manage'])->name('manage')->middleware('auth');
Route::get('/adminManage', [SearchandSortController::class, 'adminManage'])->name('adminManage')->middleware('auth');
Route::get('/employeeManage', [SearchAndSortController::class, 'manage'])->name('searchEmployee')->middleware('auth');
Route::get('/sortEmployee', [SearchAndSortController::class, 'employeeManage'])->name('employeeManage')->middleware('auth');
Route::get('/areYouSure/{id}', [UserController::class, 'areYouSure'])->middleware('auth');
Route::delete('areYouSure/manage/{id}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/create/workOrder', [UserController::class, 'createWorkOrder'])->name('create.workOrder')->middleware('auth');
Route::post('/create/newWorkOrder', [UserController::class, 'store'])->middleware('auth');
Route::get('/create/customer', [UserController::class, 'createCustomer'])->name('create.customer')->middleware('auth');
Route::get('/assignedWorkOrders', [UserController::class, 'assignedWorkOrders'])->name('assignedWorkOrders')->middleware('auth');
Route::get('/assignedWorkOrdersSort', [SearchAndSortController::class, 'assignedWorkOrdersSort'])->middleware('auth');
Route::post('/create/customer', [UserController::class, 'storeCustomer'])->middleware('auth');
Route::get('/customers', [UserController::class, 'customers'])->name('customers')->middleware('auth');
Route::get('/sortCustomers', [SearchandSortController::class, 'sortCustomers'])->middleware('auth');
Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
