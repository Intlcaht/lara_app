<?php

namespace App\Models;

use App\Models\Base\EscrowTransaction as BaseEscrowTransaction;

class EscrowTransaction extends BaseEscrowTransaction
{
	protected $fillable = [
		self::U_ID,
		self::AMOUNT,
		self::STATUS,
		self::TYPE,
		self::BALANCE,
		self::ESCROW_U_ID,
		self::TRANSACTION_CHARGE,
		self::DECLINED_DESCRIPTION,
		self::ESCROW_TRANSACTION_CHARGE_U_ID
	];
}
