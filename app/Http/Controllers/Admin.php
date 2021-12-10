<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class Admin extends Controller
{
	/**
     * Show the division management landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function division(Request $request)
    {
        return Inertia::render('Admin/Division');
    }
}
