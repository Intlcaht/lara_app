<?php

namespace App\Models;

use App\Models\Base\Payment as BasePayment;

class Payment extends BasePayment
{
	protected $fillable = [
		self::U_ID,
		self::CHECKIN_USER_U_ID,
		self::AMOUNT,
		self::PAYMENT_ID,
		self::DESCRIPTION,
		self::TRANSACTION_U_ID,
		self::ORDER_U_ID
	];
}
