<?php

namespace App\Models;

use App\Models\Base\ServiceTag as BaseServiceTag;

class ServiceTag extends BaseServiceTag
{
	protected $fillable = [
		self::U_ID,
		self::TITLE,
		self::DESCRIPTION
	];
}
