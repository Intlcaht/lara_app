<?php

namespace App\Models;

use App\Models\Base\PaymentDetail as BasePaymentDetail;

class PaymentDetail extends BasePaymentDetail
{
	protected $fillable = [
		self::U_ID,
		self::ESCROW_U_ID,
		self::BILLING_TYPE,
		self::KRA_PIN_NUMBER,
		self::BANK_HOLDER_NAME,
		self::BANK_ACCOUNT_NUMBER,
		self::BANK_NAME,
		self::BANK_BRANCH_NAME,
		self::STATUS,
		self::PHONE_NUMBER
	];
}
