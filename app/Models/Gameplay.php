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
	 * Get the player.
	 */
	public function division()
	{
		return $this->belongsTo(GameDivision::class, 'game_divisions_id');
	}

	/**
	 * Get the game's meta.
	 */
	public function meta()
	{
		return $this->hasMany(DivisionMeta::class);
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'game_divisions_id',
        'user_id',
    ];
}
