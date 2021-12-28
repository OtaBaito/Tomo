<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Division;
use App\Http\Controllers\LinkDivision;
use App\Http\Controllers\Uploader;
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
		Route::middleware(['admin'])->group(function () {
			Route::get('/division', [Division::class, 'home'])->name('division.list');
			Route::get('/division/create', [Division::class, 'createView'])->name('division.add');
			Route::get('/division/edit/{id}', [Division::class, 'editView'])->name('division.edit');
			Route::put('/division/edit/{id}', [Division::class, 'update'])->name('division.edit');
			Route::put('/division/require/{id}', [Division::class, 'require'])->name('division.requirement');
			Route::delete('/division/unrequire/{id}', [Division::class, 'unrequire'])->name('division.unrequire');
			Route::delete('/division/delete/{id}', [Division::class, 'destroy'])->name('division.destroy');
			Route::post('/division/create', [Division::class, 'create'])->name('division.add');
		});

		Route::get('/division/requirements', [Division::class, 'requirementsView'])->name('division.fill');

		Route::get('/division/link', [LinkDivision::class, 'show'])->name('division.link');
		Route::post('/division/link', [LinkDivision::class, 'linked'])->name('division.link');
		Route::delete('/division/unlink/{id}', [LinkDivision::class, 'destroy'])->name('division.unlink');
	});

	Route::name('attachment.')->group(function () {
		Route::get('/upload', [Uploader::class, 'home'])->name('list');
		Route::post('/upload', [Uploader::class, 'upload'])->name('upload');
	});
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
