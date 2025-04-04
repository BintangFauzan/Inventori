<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\HistoryController;

//memanggil dari controller
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/about-us', [AboutController::class, 'index'])->name('about')->middleware('auth');
//get barang berhasil
Route::get('/barang', [BarangController::class, 'index'])->middleware('auth');
//get create berhasil Barang
Route::get('/barang/create', [BarangController::class, 'create'])->middleware('auth');
//Berhasil disimpan ke database Barang
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store')->middleware('auth');
//Update Barang
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->middleware('auth')->name('barang.edit');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->middleware('auth')->name('barang.update');
//Delete barang
route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->middleware('auth')->name('barang.destroy');

//pembelian barang
Route::get('/pembelian', [PembelianController::class, 'index'])->middleware('auth');
Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store')->middleware('auth');

//history pembelian
Route::get('/history', [HistoryController::class, 'index'])->middleware('auth');

//To-Do List
Route::get('ToDo', [TodoController::class, 'index'])->middleware('auth');
Route::get('ToDo/create', [TodoController::class, 'create'])->middleware('auth');
//To-Do Store
Route::post('/ToDo', [TodoController::class, 'store'])->name('ToDo.store')->middleware('auth');
//To-Do Edit
Route::get('/ToDo/{todo}/edit', [TodoController::class, 'edit'])->middleware('auth')->name('ToDO.edit');
Route::put('/ToDo{todo}', [TodoController::class, 'update'])->middleware('auth')->name('ToDo.update');
Route::delete('/ToDo/{todo}', [TodoController::class, 'destroy'])->middleware('auth')->name('ToDo.destroy');
//Route::resource('barang', BarangController::class)->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

//Route Middleware
//Route::get('/flights', function () {
//    // Only authenticated users may access this route...
//})->middleware('auth');

Route::get('login', [\App\Http\Controllers\LoginController::class, 'loginform'])->name('login')->middleware('guest');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->middleware('guest');
Route::post('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout')->middleware('auth');
//Route::get('/users', [UserController::class, 'index'])  ;
//
//
//Route::get('/users/create', [UserController::class, 'create']);
//
//Route::post('/users', [UserController::class, 'store']);
//
//Route::get('/users/{user:id}', [UserController::class, 'show']);
//Route::get('/users/{user:id}/edit', [UserController::class, 'edit']);
//Route::put('/users/{user:id}', [UserController::class, 'update']);
//Route::delete('/users/{user:id}', [UserController::class, 'destroy'])->name('users.destroy');

//memanggil tetapi dari view
Route::get('/contact', function () {
    return view('contact');
});





// Route::get("users", function () {
//     return[
//         ['id' => 1, 'name' => 'John Doe'],
//         ['id' => 2, 'name' => 'John Doe'],
//     ];
// }
// );

// Route::get("users", function () {
//     $users =[
//         ['id' => 1, 'name' => 'John Doe'],
//         ['id' => 2, 'name' => 'John Doe'],
//     ];

//     return view('users.index', compact('users'));
// });
