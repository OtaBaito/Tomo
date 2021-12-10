<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Admin;
use Inertia\Inertia;

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

Route::get('/', [Landing::class, 'home'])->name('home');
Route::get('/events', [Landing::class, 'events'])->name('events');
Route::get('/about', [Landing::class, 'about'])->name('about');
Route::get('/member', [Landing::class, 'member'])->name('member');
Route::get('/contact', [Landing::class, 'contact'])->name('contact');
Route::post('/contact', [Landing::class, 'sendContact'])->name('contact.send');

Route::get('/phone/verify', [Landing::class, 'phone'])->middleware('auth')->name('phone.notice');
Route::get('/phone/verify/a', [Landing::class, 'phone'])->middleware('auth')->name('phone.verify');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::name('admin.')->group(function () {
		Route::get('/division', [Admin::class, 'division'])->name('division');
	});
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
