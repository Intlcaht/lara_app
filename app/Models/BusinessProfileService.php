<?php

namespace App\Models;

use App\Models\Base\BusinessProfileService as BaseBusinessProfileService;

class BusinessProfileService extends BaseBusinessProfileService
{
	protected $fillable = [
		self::U_ID,
		self::BUSINESS_PROFILES_ID,
		self::SERVICES_ID
	];
}
