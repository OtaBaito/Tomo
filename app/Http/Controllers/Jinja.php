<?php

namespace App\Http\Controllers;

// use Inertia\Inertia;
use Illuminate\Http\Request;

class Jinja extends Controller
{
	/**
     * Show the jinja screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function home(Request $request)
    {
        // return Inertia::render('Momo');
		return env('APP_DOMAIN');
    }
}
