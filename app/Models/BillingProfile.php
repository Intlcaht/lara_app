<?php

namespace App\Models;

use App\Models\Base\BillingProfile as BaseBillingProfile;

class BillingProfile extends BaseBillingProfile
{
	protected $fillable = [
		self::U_ID,
		self::TYPE,
		self::ACCOUNT_ID,
		self::AMOUNT,
		self::CARD_NUMBER,
		self::EXPIRY_DATE,
		self::PHONE_NUMBER_VERIFIED,
		self::PHONE_NUMBER,
		self::ACTIVE,
		self::BUSINESS_PROFILE_U_ID
	];
}
