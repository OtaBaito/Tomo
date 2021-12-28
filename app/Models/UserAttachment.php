<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UserAttachment extends Model
{
    use HasFactory;

	/**
	 * Get the player.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the attachment type.
	 */
	public function getTypeAttribute()
	{
		$mime = Storage::mimeType('public/' . $this->attachment_path);

		if (str_contains($mime, 'image')) {
			return 1;
		} elseif (str_contains($mime, 'video')) {
			return 2;
		} elseif (str_contains($mime, 'text') || str_contains($mime, 'pdf') || str_contains($mime, 'openxml') || str_contains($mime, 'vnd.ms') || str_contains($mime, 'rtf') || str_contains($mime, 'document')) {
			return 3;
		} else {
			return 4;
		}
	}

	/**
	 * Get the attachment url.
	 */
	public function getFileUrlAttribute()
	{
		return Storage::url( 'public/' . $this->attachment_path );
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'user_id',
		'title',
		'description',
		'attachment_path',
    ];

	/**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['type', 'file_url'];
}
