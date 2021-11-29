<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Landing extends Controller
{
	/**
     * Show the home landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function home(Request $request)
    {
        return Inertia::render('Landing/Home', [

		]);
    }

	/**
     * Show the events screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function events(Request $request)
    {
        return Inertia::render('Landing/Events', [
			'callouts' => [
			  [
				  'name' => 'Survival Game',
				  'description' => 'Coming Soon',
				  'imageSrc' => 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blta987e61269c6a8ff/5f4defe80ab106265a187750/Homepage_World_2.jpg',
				  'imageAlt' => 'Event crowds.',
				  'href' => '#',
				  'soon' => true,
			  ],
			  [
				  'name' => 'Survival Game',
				  'description' => 'Call of Duty Mobile Battle Royale',
				  'imageSrc' => 'https://www.callofduty.com/content/dam/atvi/callofduty/mobile/home/gamemodes/modes-battle-royale.jpg',
				  'imageAlt' => 'Call of Duty Mobile: Battle royale mode.',
				  'href' => '#',
				  'soon' => false,
			  ],
			  [
				  'name' => 'Workshop',
				  'description' => 'Coming Soon',
				  'imageSrc' => 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blta987e61269c6a8ff/5f4defe80ab106265a187750/Homepage_World_2.jpg',
				  'imageAlt' => 'Event crowds.',
				  'href' => '#',
				  'soon' => true,
			  ],
			]
		]);
    }

	/**
     * Show the about tomodachi screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function About(Request $request)
    {
        return Inertia::render('Landing/About', [
			'features' => [
				 [
					 'name' => 'Establish',
					 'description' => 'c. 2020'
				 ],
				 [
					 'name' => 'Active Members',
					 'description' => '~ 195'
				 ],
				 [
					 'name' => 'Gameplay',
					 'description' => '7'
				 ],
				 [
					 'name' => 'Awards',
					 'description' => '10'
				 ],
				 [
					 'name' => 'Avg. Win Rate',
					 'description' => '~70%'
				 ],
				 [
					 'name' => 'Play Hours',
					 'description' => '7305+'
				 ],
			],
		]);
    }

	/**
     * Show the contact tomodachi screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function Contact(Request $request)
    {
        return Inertia::render('Landing/Contact');
    }

	/**
     * Show the contact tomodachi screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function SendContact(Request $request)
    {
        return Inertia::render('Landing/Contact');
    }
}
