<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ListeCodeController;
use App\Http\Controllers\LesclasseController;

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
    return view('home',['title'=>'Home']);
})->name('home');

Route::get('/user',[UserController::class,'listeuser'])->name('user');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'register_action'])->name('register.action');
Route::delete('/user',[UserController::class,'destroy'])->name('destroy');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'login_action'])->name('login.action');
Route::get('/password',[UserController::class,'password'])->name('password');
Route::post('/password',[UserController::class,'password_action'])->name('password.action');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::delete('/eleve',[EleveController::class,'destroy']);

Route::resource('eleve',EleveController::class);
Route::resource('lesclasses',LesclasseController::class);
Route::resource('generationQrcode',ListeCodeController::class);
Route::post('/eleve/{id}',[ListeCodeController::class, 'store']);

//Route::get('/eleve/{eleve}/show', [EleveController::class,'show']);

Route::get('/classe/index',[LesclasseController::class,'index']);
Route::post('/classe/index',[LesclasseController::class,'store']);
Route::delete('/classe/index',[LesclasseController::class,'delete']);

Route::get('/qrscan', [ListeCodeController::class,'index']);
Route::post('/qrscan', [ListeCodeController::class,'checkUser']);
Route::get('/liststudents', [ListeCodeController::class,'show']);

Route::post('/eleve1',[EleveController::class,'import'])->name('excel.import');
Route::post('/eleve2',[EleveController::class,'up'])->name('vider');
