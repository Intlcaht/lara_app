<?php

namespace App\Models;

use App\Models\Base\Location as BaseLocation;

class Location extends BaseLocation
{
	protected $fillable = [
		self::NAME,
		self::DESCRIPTION,
		self::LATITUDE,
		self::LONGITUDE,
		self::U_ID
	];
}
