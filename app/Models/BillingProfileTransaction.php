<?php

namespace App\Models;

use App\Models\Base\BillingProfileTransaction as BaseBillingProfileTransaction;

class BillingProfileTransaction extends BaseBillingProfileTransaction
{
	protected $fillable = [
		self::U_ID,
		self::AMOUNT,
		self::STATUS,
		self::TYPE,
		self::BALANCE,
		self::BILLING_PROFILE_ID,
		self::TRANSFER_TO_PROFILE_ID,
		self::TRANSACTION_CHARGE,
		self::DECLINED_DESCRIPTION
	];
}
