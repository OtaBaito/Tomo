<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAttachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class Uploader extends Controller
{
	private $rules = [
		'attachment' => ['max:8192', 'mimes:webp,svg+xml,png,jpeg,gif'],
	];

	/**
     * Show the uploader screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function home(Request $request)
    {
		$attachment = $request->user()->attachments;

		// $attachment->load('type');

        return Inertia::render('Admin/Files/Upload', [
			'gallery' => $attachment
		]);
    }

	/**
     * Upload attachment and Associcate with uploader
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function upload(Request $request)
    {
		$validator = Validator::make($request->all(), $this->rules);

		$attachment = new UserAttachment;

		$attachment->user_id = $request->user()->id;
		$attachment->title = $request->file('attachment')->getClientOriginalName();

		if ($request->hasFile('attachment')) {
			$uploaded_path = $request->file('attachment')->storePublicly(
				'user-attachment', ['disk' => 'public']
			);

	        $attachment->attachment_path = $uploaded_path;
		}

		$attachment->save();

        return Redirect::route('attachment.list');
    }
}
