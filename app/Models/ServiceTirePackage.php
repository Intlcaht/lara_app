<?php

namespace App\Models;

use App\Models\Base\ServiceTirePackage as BaseServiceTirePackage;

class ServiceTirePackage extends BaseServiceTirePackage
{
	protected $fillable = [
		self::U_ID,
		self::TIRE_U_ID,
		self::PACKAGE_U_ID,
		self::SERVICE_U_ID,
		self::VALUE
	];
}
