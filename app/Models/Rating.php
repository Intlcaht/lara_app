<?php

namespace App\Models;

use App\Models\Base\Rating as BaseRating;

class Rating extends BaseRating
{
	protected $fillable = [
		self::U_ID
	];
}
