<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Gameplay;
use App\Models\GameDivision;

class LinkDivision extends Controller
{
	private $rules = [
		'gamelink' => ['required', 'integer', 'unique:gameplay'],
	];

	/**
     * Show the division management landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function show(Request $request)
    {
		$linked = [];

		foreach ($request->user()->games as $value) {
			$linked[] = $value->game_divisions_id;
		}

        return Inertia::render('Admin/Divisions/Linked', [
			'divisions' => GameDivision::all()->except($linked)->transform(function ($division) {
				return [
					'id' => $division->id,
					'label' => $division->name,
					'publisher' => $division->publisher,
					'leader' => $division->lead,
					'platform' => $division->platform,
					'cover_photo_path' => $division->cover_photo_path,
					'cover_photo_url' => $division->cover_photo_url,
					'created_at' => $division->created_at,
				];
			}),
			'games' => $request->user()->games->transform(function ($division) {
				return [
					'id' => $division->id,
					'user' => $division->user,
					'division' => $division->division,
				];
			}),
		]);
    }

	/**
     * Add new link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function linked(Request $request)
    {
		$validator = Validator::make($request->all(), $this->rules);

		$division = new Gameplay;

		$division->game_divisions_id = $validator->validated()['gamelink'];
		$division->user_id = $request->user()->id;

		$division->save();

		return Redirect::route('admin.division.link');
    }

	/**
     * Destroy link data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function destroy(Request $request, $id)
    {
		Gameplay::destroy($id);

		return Redirect::route('admin.division.link');
    }
}
