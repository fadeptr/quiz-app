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

Route::middleware('auth')->group(function(){
    // Exams
    Route::get('/admin/exams/home', App\Http\Livewire\Admin\Exams\Home::class)->name('admin.exams.home');
    Route::get('/admin/exams/create', App\Http\Livewire\Admin\Exams\Create::class)->name('admin.exams.create');
    Route::get('/admin/exams/edit/{id}', App\Http\Livewire\Admin\Exams\Edit::class)->name('admin.exams.edit');
    // Questions
    Route::get('/admin/questions/index/{id}', App\Http\Livewire\Admin\Questions\Index::class)->name('admin.questions.index');
    Route::get('/admin/questions/create/{id}', App\Http\Livewire\Admin\Questions\Create::class)->name('admin.questions.create');
    Route::get('/admin/questions/edit/{id}/{question_id}', App\Http\Livewire\Admin\Questions\Edit::class)->name('admin.questions.edit');
    // User Exams
    Route::get('/exams', App\Http\Livewire\User\Exams\Home::class)->name('user.exams.home');
    Route::get('/exams/{id}', App\Http\Livewire\User\Exams\Show::class)->name('user.exams.show');
    Route::get('/results/{id}', App\Http\Livewire\User\Exams\Result::class)->name('user.exams.result');
    // User Questions
    Route::get('/questions/{id}', App\Http\Livewire\User\Questions\Index::class)->name('user.questions.index');
    // Nambah Sesuatu
});
// Users
Route::get('/admin/users/home', App\Http\Livewire\Admin\Users\Home::class);

