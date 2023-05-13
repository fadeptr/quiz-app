<?php

use Carbon\Carbon;
use App\Models\Membership;
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
Route::get('/profile', App\Http\Livewire\Profile::class)->name('profile');
Route::get('/gambar', App\Http\Livewire\Gambar::class)->name('gambar');

// Harus login
Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        // Exams
        Route::get('/exams/home', App\Http\Livewire\Admin\Exams\Home::class)->name('admin.exams.home');
        Route::get('/exams/create', App\Http\Livewire\Admin\Exams\Create::class)->name('admin.exams.create');
        Route::get('/exams/edit/{id}', App\Http\Livewire\Admin\Exams\Edit::class)->name('admin.exams.edit');
        // Questions
        Route::get('/questions/index/{id}', App\Http\Livewire\Admin\Questions\Index::class)->name('admin.questions.index');
        Route::get('/questions/create/{id}', App\Http\Livewire\Admin\Questions\Create::class)->name('admin.questions.create');
        Route::get('/questions/edit/{id}/{question_id}', App\Http\Livewire\Admin\Questions\Edit::class)->name('admin.questions.edit');
        // Users
        Route::get('/users/home', App\Http\Livewire\Admin\Users\Home::class)->name('admin.users.home');
        // Exam Users
        Route::get('/exam-users/home/{id}', App\Http\Livewire\Admin\Exams\Users\Home::class)->name('admin.exams.users.home');

    });
    // User Exams
    Route::get('/exams', App\Http\Livewire\User\Exams\Home::class)->name('user.exams.home');
    Route::get('/exams/{id}', App\Http\Livewire\User\Exams\Show::class)->name('user.exams.show');
    // User Questions
    Route::get('/questions/{id}', App\Http\Livewire\User\Questions\Index::class)->name('user.questions.index');
    Route::get('/results/{id}', App\Http\Livewire\User\Questions\Result::class)->name('user.questions.result');
});
