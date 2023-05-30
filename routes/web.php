<?php

use App\Http\Controllers\Esp32Data;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AnoterOperation;

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
    return view('login');
})->name('loginPage');

Route::post('/login', [AnoterOperation::class, 'login'])->name('goIndexPage');
Route::get('/logout', [AnoterOperation::class, 'logout'])->name('goOutProg');


Route::get('/index', function () {
    if (Session::get('username')) {
        return view('index');
    } else {
        return redirect()->route('loginPage');
    }
})->name('indexPage');

Route::get('/get_things_data', [Esp32Data::class, 'index'])->name('thingsData');



/* *************************************************************************************** */
/*                                 عمليات ادارة المستخدمين                               */
Route::get('/profile', function () {
    if (Session::get('username')) {
        return view('profile');
    } else {
        return redirect()->route('loginPage');
    }
})->name('profilePage');
Route::get('/users', [AnoterOperation::class, 'indexUsers'])->name('usersPage');
Route::post('/store-user', [AnoterOperation::class, 'storeUser'])->name('storeUser');
Route::get('/delete-user/{key}', [AnoterOperation::class, 'destroyUser'])->name('deleteUser');
Route::post('/edit-user', [AnoterOperation::class, 'updateUser'])->name('editUser');
/* *************************************************************************************** */

/* *************************************************************************************** */
/*                                 عمليات المستخدمين                               */
Route::post('/chang-user-pass', [AnoterOperation::class, 'changePassword'])->name('changPass');
Route::post('/chang-user-image', [AnoterOperation::class, 'changeImage'])->name('changeImage');
/* *************************************************************************************** */

Route::get('/notification', function () {
    if (Session::get('username')) {
        return view('notifications');
    } else {
        return redirect()->route('loginPage');
    }
})->name('notificationPage');







/* *************************************************************************************** */
/*                                عمليات التحكم في الاشياء                                */
Route::post('/room1_light', [Esp32Data::class, 'room1_light_fn'])->name('room1_light');
Route::post('/room1_motor', [Esp32Data::class, 'room1_motor_fn'])->name('room1_motor');
/* *************************************************************************************** */