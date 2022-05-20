<?php

namespace App\Models;

use App\Models\Base\UserBusinessProfile as BaseUserBusinessProfile;

class UserBusinessProfile extends BaseUserBusinessProfile
{
	protected $fillable = [
		self::U_ID,
		self::USER_U_ID,
		self::PROFILE_U_ID
	];
}
