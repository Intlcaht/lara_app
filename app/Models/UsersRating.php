<?php

namespace App\Models;

use App\Models\Base\UsersRating as BaseUsersRating;

class UsersRating extends BaseUsersRating
{
	protected $fillable = [
		self::U_ID,
		self::RATE_BY_U_ID,
		self::RATING,
		self::COMMENT,
		self::USER_U_ID
	];
}
