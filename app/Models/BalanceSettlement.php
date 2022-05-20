<?php

namespace App\Models;

use App\Models\Base\BalanceSettlement as BaseBalanceSettlement;

class BalanceSettlement extends BaseBalanceSettlement
{
	protected $fillable = [
		self::U_ID,
		self::AMOUNT,
		self::STATUS,
		self::USER_U_ID,
		self::FULLFILLED_AMOUNT,
		self::FULLFILLED_DATE,
		self::DESCRIPTION
	];
}
