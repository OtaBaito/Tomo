<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerifyPhone;
use Illuminate\Notifications\Notifiable;

class Landing extends Controller
{
	use Notifiable;

	/**
     * Show the home landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function home(Request $request)
    {
        return Inertia::render('Landing/Home');
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
					 'name' => 'Awards',
					 'description' => '10'
				 ],
				 [
					 'name' => 'Avg. Win Rate',
					 'description' => '~70%'
				 ],
			],
			'members' => [
				[
					'id' => 1,
					'name' => 'Armiko Sandi M.D.',
					'href' => '#',
					'imageSrc' => 'assets/mascot.png',
					'imageAlt' => "Picture of Himself",
					'division' => 'CC',
					'role' => 'President',
				],
				[
					'id' => 2,
					'name' => 'Okabe Rintaro',
					'href' => '#',
					'imageSrc' => 'assets/mascot.png',
					'imageAlt' => "Picture of Himself",
					'division' => 'CC',
					'role' => 'Secretary',
				],
				[
					'id' => 3,
					'name' => 'Walter Paul',
					'href' => '#',
					'imageSrc' => 'assets/mascot.png',
					'imageAlt' => "Picture of Himself",
					'division' => 'CC',
					'role' => 'Treasurer',
				],
				[
					'id' => 4,
					'name' => 'Mary Sue',
					'href' => '#',
					'imageSrc' => 'assets/mascot.png',
					'imageAlt' => "Picture of Himself",
					'division' => 'CC',
					'role' => 'Sufficient other role',
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
    public function Member(Request $request)
    {
        return Inertia::render('Landing/Member');
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

	/**
     * Show the contact tomodachi screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function Phone(Request $request)
    {
		if ($request->user()) {
			return $request->user()->notify(new VerifyPhone());
		} else {
			return 'NOt aUthentiCateD';
		}
		// return Notification::sendNow('', new VerifyPhone());
        // return Inertia::render('Landing/Contact');
    }
}
