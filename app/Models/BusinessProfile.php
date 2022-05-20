<?php

namespace App\Models;

use App\Models\Base\BusinessProfile as BaseBusinessProfile;

class BusinessProfile extends BaseBusinessProfile
{
	protected $fillable = [
		self::U_ID,
		self::CAP_PERCENTAGE,
		self::IS_ONLINE,
		self::ADDRESS,
		self::TITLE,
		self::DESCRIPTION,
		self::STATUS,
		self::TERMS_AND_CONDITIONS
	];
}
