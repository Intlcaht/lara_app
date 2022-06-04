<?php

namespace App\Models;

use App\Models\Base\BusinessProfile as BaseBusinessProfile;

class BusinessProfile extends BaseBusinessProfile
{
	protected $fillable = [
		self::U_ID,
		self::CAP_PERCENTAGE,
		self::ESCROW_U_ID,
		self::SERVICE_NOTIFIER_USER_U_ID,
		self::IS_ONLINE,
		self::ADDRESS,
		self::TITLE,
		self::DESCRIPTION,
		self::STATUS,
		self::TERMS_AND_CONDITIONS
	];
}
