<?php

namespace App\Models;

use App\Models\Base\BusinessProfileAdapter as BaseBusinessProfileAdapter;

class BusinessProfileAdapter extends BaseBusinessProfileAdapter
{
	protected $fillable = [
		self::U_ID,
		self::ADAPTER_U_ID,
		self::PROFILE_U_ID,
		self::MIN_AMOUNT,
		self::MAX_AMOUNT,
		self::MAX_PERCENTAGE,
		self::MIN_PERCENTAGE,
		self::PERCENTAGE,
		self::BALANCE,
		self::TYPE
	];
}
