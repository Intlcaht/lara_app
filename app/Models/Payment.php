<?php

namespace App\Models;

use App\Models\Base\Payment as BasePayment;

class Payment extends BasePayment
{
	protected $fillable = [
		self::U_ID,
		self::CHECKIN_USER_U_ID,
		self::AMOUNT,
		self::DESCRIPTION,
		self::ORDER_U_ID,
		self::BUSINESS_PROFILE_ADAPTER_U_ID,
		self::SERVICE_U_ID,
		self::ESCROW_TRANSACTION_U_ID
	];
}
