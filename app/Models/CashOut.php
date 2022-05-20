<?php

namespace App\Models;

use App\Models\Base\CashOut as BaseCashOut;

class CashOut extends BaseCashOut
{
	protected $fillable = [
		self::U_ID,
		self::AMOUNT,
		self::USER_U_ID,
		self::PERIOD_BOUND_UPPER,
		self::PERIOD_BOUND_LOWER,
		self::CASH_AMOUNT,
		self::E_WALLET_AMOUNT,
		self::WALLET_BALANCE,
		self::CAP_PERCENTAGE,
		self::BALANCE_SETTLEMENT_U_ID,
		self::DEPOSI_TRANSACTION_U_ID,
		self::WITHDRAW_TRANSACTION_U_ID
	];
}
