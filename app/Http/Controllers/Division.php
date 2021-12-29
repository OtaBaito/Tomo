<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GameDivision;
use App\Models\DivisionRequirement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Division extends Controller
{
	private $rules = [
		'name' => ['required', 'max:100'],
		'publisher' => ['required', 'max:100'],
		'platform' => ['required', 'integer', 'max:4'],
		'leader' => ['required', 'integer'],
		'photo' => ['max:8192', 'mimes:webp,svg+xml,png,jpeg,gif'],
	];

	private $requirement = [
		'name' => ['required', 'max:100'],
		'publisher' => ['required', 'max:100'],
		'platform' => ['required', 'integer', 'max:4'],
		'leader' => ['required', 'integer'],
		'photo' => ['max:8192', 'mimes:webp,svg+xml,png,jpeg,gif'],

		'title' => ['required', 'max:100'],
		'description' => ['max:300'],
		'attachment' => ['required', 'integer', 'max:4'],
		'mandate' => ['required', 'integer'],
	];

	/**
     * Show the division management landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function home(Request $request)
    {
        return Inertia::render('Admin/Divisions/Show', [
			'leaders' => User::all()->filter(function ($user) {
				if ($user->hasTeamPermission($user->currentTeam, 'server:update')) {
					return $user;
				}
			})->transform(function ($user) {
				return [
					'id' => $user->id,
					'label' => $user->name,
				];
			}),
			'keyword' => $request->input('keyword'),
            'divisions' => GameDivision::where('name', 'like', '%' . $request->input('keyword') . '%')
							->orderByDesc('updated_at')
							->paginate(10)
							->through(fn ($division) => [
								'id' => $division->id,
								'name' => $division->name,
								'publisher' => $division->publisher,
								'leader' => $division->lead,
								'platform' => $division->platform,
								'cover_photo_path' => $division->cover_photo_path,
								'cover_photo_url' => $division->cover_photo_url,
								'created_at' => $division->created_at,
							]),
		]);
    }

	/**
     * Show the division creation landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function createView(Request $request)
    {
        return Inertia::render('Admin/Divisions/Create', [
			'leaders' => User::all()->filter(function ($user) {
				if ($user->hasTeamPermission($user->currentTeam, 'server:update')) {
					return $user;
				}
			})->transform(function ($user) {
				return [
					'id' => $user->id,
					'label' => $user->name,
				];
			}),
		]);
    }

	/**
     * Show the division management landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function editView(Request $request, $id)
    {
		$dvs = GameDivision::find($id);
		$dvs->load('requirements');

        return Inertia::render('Admin/Divisions/Edit', [
			'leaders' => User::all()->filter(function ($user) {
				if ($user->hasTeamPermission($user->currentTeam, 'server:update')) {
					return $user;
				}
			})->transform(function ($user) {
				return [
					'id' => $user->id,
					'label' => $user->name,
				];
			}),
			'division' => $dvs,
		]);
    }

	/**
     * Add new divisions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
		$validator = Validator::make($request->all(), $this->rules);

		$division = new GameDivision;

		$division->name = $validator->validated()['name'];
		$division->leader = $validator->validated()['leader'];
		$division->publisher = $validator->validated()['publisher'];
		$division->platform = $validator->validated()['platform'];

		if ($request->hasFile('photo')) {
			$division->updateCoverPhoto($request->file('photo'));
		}

		$division->save();

		return Redirect::route('admin.division.list');
    }

	/**
     * Show the division management landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function requirementsView(Request $request)
    {
		$dvs = GameDivision::all();
		// $dvs->load('requirements');

        return Inertia::render('Admin/Divisions/Requirement', [
			'divisions' => $dvs,
		]);
    }

	/**
     * Show the division management landing screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function requirementView(Request $request, $id)
    {
		$dvs = GameDivision::find($id);
		$dvs->load('requirements');

        return Inertia::render('Admin/Divisions/Requirement', [
			'division' => $dvs,
		]);
    }

	/**
     * Add new division requirement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function require(Request $request, $id)
    {
		$validator = Validator::make($request->all(), $this->requirement);

		$division = new DivisionRequirement;

		$division->game_division_id = $id;
		$division->title = $validator->validated()['title'];
		$division->description = $validator->validated()['description'];
		$division->attachment = $validator->validated()['attachment'];
		$division->mandate = $validator->validated()['mandate'];

		$division->save();

		return Redirect::route('admin.division.edit', $id);
    }

	/**
     * Add new division requirement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function unrequire(Request $request, $id)
    {
		$requirement = DivisionRequirement::find($id);

		$callback = $requirement->game_division_id;

		$requirement->delete();

		return Redirect::route('admin.division.edit', $callback);
    }

	/**
     * Update divisions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function update(Request $request, $id)
    {
		$validator = Validator::make($request->all(), $this->rules);

		$division = GameDivision::find($id);

		$division->name = $validator->validated()['name'];
		$division->leader = $validator->validated()['leader'];
		$division->publisher = $validator->validated()['publisher'];
		$division->platform = $validator->validated()['platform'];

		if ($request->hasFile('photo')) {
			$division->updateCoverPhoto($request->file('photo'));
		}

		$division->save();

		$dvs = GameDivision::find($id);
		$dvs->load('requirements');

		return Inertia::render('Admin/Divisions/Edit', [
			'division' => $dvs,
		]);
    }

	/**
     * Destroy divisions data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function destroy(Request $request, $id)
    {
		$division = GameDivision::find($id);

		foreach ($division->players as $player) {
			$player->delete();
		}

		$division = GameDivision::destroy($id);

		return Redirect::route('admin.division.list');
    }
}
