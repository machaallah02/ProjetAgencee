<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
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
$idregex='[0-9]+';
$slugregex='[0-9a-z\-]+';
Route::get('/',[HomeController::class, 'index']);
Route::get('/biens', [ControllersPropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [ControllersPropertyController::class, 'show'])->name('property.show')->where([
    'property'=>$idregex,
    'slug'=>$slugregex
]);
Route::post('/biens/{property}/contact', [ControllersPropertyController::class, 'contact'])->name('property.contact')->where(['property'=>$idregex]);

Route::get('/login', [AuthController::class, 'login'])
->middleware('guest')
->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/login', [AuthController::class, 'logout'])
->middleware('auth')
->name('logout');


Route::get('/images/{path}', [ImagesController::class, 'show'])->where('path','.*');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() use ($idregex) {
 Route::resource('property',PropertyController::class)->except('show');
 Route::resource('option',OptionController::class)->except('show');
 Route::delete('picture/{picture}', [PictureController::class,'destroy'])->name('picture.destroy')
 ->where(['picture'=>$idregex]);
});
