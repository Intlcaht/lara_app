<?php

namespace App\Models;

use App\Models\Base\UserProfile as BaseUserProfile;

class UserProfile extends BaseUserProfile
{
	protected $fillable = [
		self::U_ID,
		self::FIRST_NAME,
		self::LAST_NAME,
		self::NATIONAL_ID,
		self::ADDRESS,
		self::COUNTY,
		self::PHOTO_URL,
		self::MIDDLE_NAME,
		self::INITIALS
	];
}
