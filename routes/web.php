<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\GenresController;
use App\Http\Controllers\Client\StoryController;
use App\Http\Controlers\Admin\LoginController;
use App\Http\Controlers\Admin\LogoutController;
use App\Http\Controlers\Admin\RegisterController;
//admin
use App\Http\Controllers\quantri\TruyenController;
use App\Http\Controllers\quantri\TheLoaiController;
use App\Http\Controllers\quantri\NguoiDungController;

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

//client
Route::get('/', [GenresController::class, 'get_for_home']);

Route::get('/the-loai/{slug}', [GenresController::class, 'get_genre_by_slug']);
Route::get('/truyen/{slug}', [StoryController::class, 'get_story_by_slug']);

//user
Route::get('/dashboard', function(){
    return view('user/dashboard');
})->middleware('auth');


//admin
Route::get('/admin', function (){
    return view('admin/dashboard');
})->middleware('auth', 'Admin');

    //truyen
Route::middleware(['auth', 'Admin'])->group(function(){

    Route::get('/admin/truyen/danh-sach', [TruyenController::class, 'index']);
    Route::get('/admin/truyen/them', [TruyenController::class, 'create']);
    Route::post('/admin/truyen/them', [TruyenController::class, 'store']);

    Route::get('/admin/truyen/sua/{slug}', [TruyenController::class, 'edit']);
    Route::post('/admin/truyen/sua/{slug}', [TruyenController::class, 'update']);
    Route::get('/admin/truyen/xoa/{slug}', [TruyenController::class, 'destroy']);

    //the loai
    Route::get('/admin/the-loai/danh-sach', [TheLoaiController::class, 'index']);
    Route::get('/admin/the-loai/them', [TheLoaiController::class, 'create']);
    Route::post('/admin/the-loai/them', [TheLoaiController::class, 'store'])->name('them-the-loai');

    Route::get('/admin/the-loai/sua/{slug}', [TheLoaiController::class, 'edit']);
    Route::post('/admin/the-loai/sua/{slug}', [TheLoaiController::class, 'update'])->name('sua-the-loai');
    Route::get('/admin/the-loai/xoa/{slug}', [TheLoaiController::class, 'destroy']);

    //user
    Route::get('/admin/user/danh-sach', [NguoiDungController::class, 'index']);
    Route::get('/admin/danh-sach', [NguoiDungController::class, 'show']);
    Route::get('/admin/them', [NguoiDungController::class, 'create']);
    Route::post('/admin/them', [NguoiDungController::class, 'store']);
    Route::get('/admin/xoa/{id}', [NguoiDungController::class, 'destroy']);
});
require __DIR__.'/auth.php';
