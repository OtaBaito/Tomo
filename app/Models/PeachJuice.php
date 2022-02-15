<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeachJuice extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'peach_id',
		'referer',
		'location',
		'ip_address',
		'user_agent',
	];

	/**
	 * Get the fruit base.
	 */
	public function peach()
	{
		return $this->belongsTo(Peach::class);
	}
}
