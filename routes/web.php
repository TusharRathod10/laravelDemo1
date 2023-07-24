<?php

use App\Http\Controllers\AjaxFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/form', [App\Http\Controllers\FormController::class, 'index']);
Route::post('/form', [App\Http\Controllers\FormController::class, 'insert']);
Route::get('/delete_admin/{id}', [App\Http\Controllers\FormController::class, 'deleteAdmin']);
Route::get('/update_admin/{id}', [App\Http\Controllers\FormController::class, 'updateAdmin']);
Route::post('/update_form', [App\Http\Controllers\FormController::class, 'updateAdmindata']);

Route::get('/', [CategoryController::class, 'category']);
Route::get('/add_category', [CategoryController::class, 'create']);
Route::post('/store_category', [CategoryController::class, 'store']);
Route::get('/edit_category/{id}', [CategoryController::class, 'edit']);
Route::put('/update_category/{id}', [CategoryController::class, 'update']);
Route::delete('/remove_category/{id}', [CategoryController::class, 'remove']);

Route::get('/ajax', function () {
    return view('ajax/ajax-form');
});
Route::post('/ajax', [AjaxFormController::class, 'create'])->name('create');
Route::get('/get_data', function () {
    return view('ajax.ajax-data');
});
Route::get('/alldata', [AjaxFormController::class, 'alldata'])->name('alldata');
Route::get('/delete-data/{id}', [AjaxFormController::class, 'deletedata']);
Route::get('/editdata/{id}', [AjaxFormController::class, 'editdata']);
Route::post('/updatedata', [AjaxFormController::class, 'updatedata'])->name('updatedata');
