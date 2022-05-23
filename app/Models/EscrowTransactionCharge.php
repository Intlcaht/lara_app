<?php

namespace App\Models;

use App\Models\Base\EscrowTransactionCharge as BaseEscrowTransactionCharge;

class EscrowTransactionCharge extends BaseEscrowTransactionCharge
{
	protected $fillable = [
		self::U_ID,
		self::LOWER_BOUND,
		self::UPPER_BOUND,
		self::CHARGE_TYPE,
		self::TRANSACTION_TYPE,
		self::CHARGE
	];
}
