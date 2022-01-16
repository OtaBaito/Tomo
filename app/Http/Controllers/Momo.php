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
					'name' => 'FPS',
					'links' => [
						[
							'name' => 'CODM',
							'url' => 'https://wa.me/6283196052360',
						],
						[
							'name' => 'VALORANT',
							'url' => 'https://wa.me/62895371022890',
						],
					]
				],
				[
					'name' => 'MOBA',
					'links' => [
						[
							'name' => 'MLBB',
							'url' => 'https://wa.me/62895371022890',
						],
						[
							'name' => 'LoL:WR',
							'url' => 'https://wa.me/6285890301353',
						],
					]
				],
				[
					'name' => 'BUSINESS',
					'links' => [
						[
							'name' => 'Partnership',
							'url' => 'https://wa.me/628884090791',
						],
						[
							'name' => 'Sponsorship',
							'url' => 'https://wa.me/628884090791',
						],
						[
							'name' => 'Branding Materials',
							'url' => 'https://drive.google.com/drive/folders/1m-wD1dGW1eQoiMyrNWpZGHFG-mGUAWXA',
						],
					]
				],
			]
		]);
    }
}
