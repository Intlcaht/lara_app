<?php

namespace App\Models;

use App\Models\Base\CashOut as BaseCashOut;

class CashOut extends BaseCashOut
{
	protected $fillable = [
		self::U_ID,
		self::AMOUNT,
		self::ESCROW_U_ID,
		self::PERIOD_BOUND_UPPER,
		self::PERIOD_BOUND_LOWER,
		self::BALANCE,
		self::CAP_PERCENTAGE,
		self::ESCROW_TRANSACTION_U_ID
	];
}
