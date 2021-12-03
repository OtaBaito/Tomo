<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Jinja;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('jinja.')->group(function () {
	Route::get('/', [Jinja::class, 'home'])->name('jinja');

	Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
		return $request->user();
	});
});
