<?php

namespace App\Models;

use App\Models\Base\Commission as BaseCommission;

class Commission extends BaseCommission
{
	protected $fillable = [
		self::U_ID,
		self::NAME,
		self::COMMISSION_ID,
		self::DESCRIPTION,
		self::TYPE,
		self::VALUE,
		self::FUNCTION_TYPE,
		self::SERVICE_U_ID
	];
}
