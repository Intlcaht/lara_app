<?php

namespace App\Models;

use App\Models\Base\UserProfile as BaseUserProfile;

class UserProfile extends BaseUserProfile
{
	protected $fillable = [
		self::U_ID,
		self::FIRST_NAME,
		self::LAST_NAME,
		self::PROFILE_PHOTO_PATH,
		self::NATIONAL_ID,
		self::ADDRESS,
		self::COUNTY,
		self::PHOTO_URL,
		self::INITIALS
	];
}
