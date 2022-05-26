<?php

use App\Http\Controllers\Form;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/add',[Form::class,'index'] );

Route::get('/',[Form::class,'allevents'] )->middleware('auth');

Route::post('/add',[Form::class,'store']);

Route::get('/events',[Form::class,'all']);

Route::get('/register',[UserController::class,'create']);

Route::post('/register',[UserController::class,'store']);

Route::get('/login',[UserController::class,'createLogin'])->name('login');

Route::post('/login',[UserController::class,'checkUsers']);

Route::get('/logout',[UserController::class,'logout']);

Route::get('event/delete/{id}',[Form::class,'delete'])->name('eventdelete');

Route::get('edit/{id}',[Form::class,'edit'])->name('events.edit');

Route::post('update/{id}',[Form::class,'update'])->name('events.update');

Route::get('search',[Form::class,'search']);

Route::get('/users',[UserController::class,'allusers'])->name('users');

Route::get('delete/{id}',[UserController::class,'delete'])->name('user.delete');



