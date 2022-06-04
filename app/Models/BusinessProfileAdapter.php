<?php

namespace App\Models;

use App\Models\Base\BusinessProfileAdapter as BaseBusinessProfileAdapter;

class BusinessProfileAdapter extends BaseBusinessProfileAdapter
{
	protected $fillable = [
		self::U_ID,
		self::ACTIVE,
		self::PROFILE_U_ID,
		self::LOSS,
		self::PROFIT,
		self::MAX_PAYMENT,
		self::MIN_PAYMENT,
		self::BALANCE
	];
}
