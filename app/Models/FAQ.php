<?php

namespace App\Models;

use App\Models\Base\FAQ as BaseFAQ;

class FAQ extends BaseFAQ
{
	protected $fillable = [
		self::U_ID,
		self::TAG,
		self::TITLE,
		self::ILLUSTRATION,
		self::SERVICE_U_ID
	];
}
