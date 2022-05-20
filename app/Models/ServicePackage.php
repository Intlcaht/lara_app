<?php

namespace App\Models;

use App\Models\Base\ServicePackage as BaseServicePackage;

class ServicePackage extends BaseServicePackage
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_U_ID,
		self::NAME,
		self::AMOUNT
	];
}
