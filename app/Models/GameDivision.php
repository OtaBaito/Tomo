<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Actions\Tomodachi\HasCoverPhoto;

class GameDivision extends Model
{
    use HasFactory;
	use HasCoverPhoto;

	/**
	 * Get the game's players.
	 */
	public function players()
	{
		return $this->hasMany(Gameplay::class, 'game_divisions_id');
	}

	/**
	 * Get the game's players.
	 */
	public function requirements()
	{
		return $this->hasMany(DivisionRequirement::class, 'game_division_id');
	}

	/**
	 * Get the game's leader.
	 */
	public function lead()
	{
		return $this->hasOne(User::class, 'id', 'leader');
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'platform',
        'publisher',
        'leader',
    ];

	/**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
		'cover_photo_url',
    ];
}
