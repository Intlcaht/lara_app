<?php

namespace App\Models;

use App\Models\Base\CheckinUser as BaseCheckinUser;

class CheckinUser extends BaseCheckinUser
{
	protected $fillable = [
		self::U_ID,
		self::CHECK_IN_U_ID,
		self::USER_U_ID,
		self::CHECKOUT_TIME,
		self::CHECKOUT_DESCRIPTION,
		self::ESTIMATED_COMPLETION_CHECKIN_PERCENTAGE,
		self::ESTIMATED_CHECKIN_COST,
		self::ESTIMATED_COMPLETION_TIME_TYPE,
		self::CHECKIN_PHOTO,
		self::RATING_U_ID
	];
}
