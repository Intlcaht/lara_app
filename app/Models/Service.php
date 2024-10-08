<?php

namespace App\Models;

use App\Models\Base\Service as BaseService;

class Service extends BaseService
{
	protected $fillable = [
		self::U_ID,
		self::TITLE,
		self::DESCRIPTION,
		self::EXPECTED_DELIVERY,
		self::LOCATION_LAT,
		self::LOCATION_LONG
	];
}
