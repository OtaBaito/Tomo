<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameplayRequirement extends Model
{
    use HasFactory;

	/**
	 * Get the gameplay.
	 */
	public function gameplay()
	{
		return $this->belongsTo(Gameplay::class, 'gameplays_id');
	}

	/**
	 * Get the requirements.
	 */
	public function requirements()
	{
		return $this->belongsTo(DivisionRequirement::class, 'division_requirements_id');
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'gameplays_id',
		'division_requirements_id',
    ];
}
