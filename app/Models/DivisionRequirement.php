<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionRequirement extends Model
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
		return $this->belongsTo(GameDivision::class);
	}

	/**
	 * Get the game's meta.
	 */
	public function progress()
	{
		return $this->hasMany(GameplayRequirement::class, 'division_requirements_id');
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'game_division_id',
		'title',
		'description',
		'attachment',
		'mandate',
    ];
}
