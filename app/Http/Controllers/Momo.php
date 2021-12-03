<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class Momo extends Controller
{
	/**
     * Show the momo screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function home(Request $request)
    {
        return Inertia::render('Momo', [
			'categories' => [
				[
					'name' => 'Category Name',
					'links' => [
						[
							'name' => 'Action Button',
							'url' => '#',
						],
						[
							'name' => 'Action Button',
							'url' => '#',
						],
					]
				],
				[
					'name' => 'Another Category',
					'links' => [
						[
							'name' => 'More Action Button',
							'url' => '#',
						],
						[
							'name' => 'More Action Button',
							'url' => '#',
						],
					]
				],
			]
		]);
    }
}
