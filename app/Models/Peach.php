<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peach extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'name',
		'peach_id',
		'momo',
		'url',
	];

	/**
	 * Get the fruit base.
	 */
	public function peach()
	{
		return $this->belongsTo(Peach::class);
	}
}
