<?php

namespace App\Models;

use App\Models\Base\ServiceTagCheckIn as BaseServiceTagCheckIn;

class ServiceTagCheckIn extends BaseServiceTagCheckIn
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_TAG_U_ID,
		self::CHECK_IN_U_ID
	];
}
