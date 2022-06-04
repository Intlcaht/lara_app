<?php

namespace App\Models;

use App\Models\Base\ServiceNotification as BaseServiceNotification;

class ServiceNotification extends BaseServiceNotification
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_U_ID,
		self::PROJECT_U_ID,
		self::ACTIVE,
		self::RADIUS
	];
}
