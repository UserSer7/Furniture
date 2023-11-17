<?php

use App\Models\barang;
use App\Models\product;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;

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
Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

// resources\views\admin\crud\addData.blade.php
Route::get('/admin/crud/addData', function () {
    return view('admin.crud.addData');
})->name('admin.addDataa');

Route::get('/admin/barang', function () {
    return view('excel.admin.barang');
})->name('downloadexcel');
Route::get('admin/barang/download-excel', [BarangController::class, 'download_excel'])->name('download.excel');

// Route::get('/admin/download_excel','admin\homecontroller@download_excel');

Route::middleware('auth')->group(function(){
    Route::get('/admin/barang', function () {
        return view('admin.barang');
    })->name('admin.barang');

    Route::get('/admin/barang', function () {
        return view('admin.barang', [
        "barang" => barang::all()
        ]);
    })->name('admin.barang');

});


Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::post('/register/action', [
    AuthController::class, 'registerAction'
])->name('register.action');
Route::get('/logout', [
    AuthController::class, 'logout'
])->name('logout');

Route::post('/login/action', [
    AuthController::class, 'loginAction'
])->name('login.action');

Route::controller(BarangController::class)->group(function(){
    Route::post('/tambah/action','push')->name('admin.push');
    Route::get('admin/barang/edit/{id}', 'edit')->name('admin.edit');
    Route::post('admin/barang/edit/{id}/action', 'update')->name('admin.update');
    Route::post('/admin/barang/delete/{id}/action', 'delete')->name('admin.delete');
});
