<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gameplay extends Model
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
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'division_id',
        'user_id',
    ];
}