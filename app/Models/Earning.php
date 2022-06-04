<?php

namespace App\Models;

use App\Models\Base\Earning as BaseEarning;

class Earning extends BaseEarning
{
	protected $fillable = [
		self::U_ID,
		self::CHECKIN_USER_U_ID,
		self::AMOUNT,
		self::STATUS,
		self::DESCRIPTION,
		self::ORDER_U_ID
	];
}
