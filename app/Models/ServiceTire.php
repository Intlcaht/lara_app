<?php

namespace App\Models;

use App\Models\Base\ServiceTire as BaseServiceTire;

class ServiceTire extends BaseServiceTire
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_U_ID,
		self::TITLE,
		self::DESCRIPTION
	];
}
