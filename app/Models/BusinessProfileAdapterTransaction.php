<?php

namespace App\Models;

use App\Models\Base\BusinessProfileAdapterTransaction as BaseBusinessProfileAdapterTransaction;

class BusinessProfileAdapterTransaction extends BaseBusinessProfileAdapterTransaction
{
	protected $fillable = [
		self::U_ID,
		self::ORDER_U_ID,
		self::BALANCE,
		self::CONFIRMED_BID,
		self::CONFIRMED_BID_TYPE,
		self::TYPE,
		self::BUSINESS_PROFILE_ADAPTER_U_ID
	];
}
