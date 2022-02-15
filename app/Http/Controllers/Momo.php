<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Peach;
use App\Models\PeachJuice;
use Jenssegers\Agent\Agent;

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

	/**
     * Redirect the momo juice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function juice(Request $request, $url)
    {
		$peach = Peach::where('name', $url);

        if ($peach->count() > 0) {
			$glass = $peach->first();

			if ($glass->momo) {
				return 'Invalid';
			} else {
				$agent = $this->createAgent($request);

				if ($agent->isRobot()) {
					return 'Momo';
				} else {
					

					return redirect()->away($glass->url);
				}
			}
        } else {
			return 'Not Found';
		}
    }

	/**
     * Show the add momo screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function add(Request $request)
    {
        return Inertia::render('Admin/Momolink/Create', [
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

	/**
     * Create a new agent instance from the given session.
     *
     * @param  mixed  $session
     * @return \Jenssegers\Agent\Agent
     */
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}
