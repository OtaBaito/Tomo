<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionMeta extends Model
{
    use HasFactory;

	/**
	 * Get the player.
	 */
	public function gameplay()
	{
		return $this->belongsTo(Gameplay::class);
	}

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
	public function requirement()
	{
		return $this->belongsTo(DivisionRequirement::class);
	}

	/**
	 * Get the player.
	 */
	public function attachment()
	{
		return $this->belongsTo(UserAttachment::class);
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'gameplay_id',
		'division_requirement_id',
		'user_id',
		'description',
		'user_attachment_id',
    ];

}
