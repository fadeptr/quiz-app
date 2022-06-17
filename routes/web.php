<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', App\Http\Livewire\LandingPage::class);
// Exams
Route::middleware('auth')->group(function(){
    Route::get('/admin/exams/home', App\Http\Livewire\Admin\Exams\Home::class)->name('admin.exams.home');
    Route::get('/admin/exams/create', App\Http\Livewire\Admin\Exams\Create::class)->name('admin.exams.create');
    Route::get('/admin/exams/edit/{id}', App\Http\Livewire\Admin\Exams\Edit::class)->name('admin.exams.edit');
});
// Users
Route::get('/admin/users/home', App\Http\Livewire\Admin\Users\Home::class);

