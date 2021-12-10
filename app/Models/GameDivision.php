<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameDivision extends Model
{
    use HasFactory;

	/**
	 * Get the invoice's product.
	 */
	public function player()
	{
		return $this->hasMany(Gameplay::class, 'division');
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
    ];
}
