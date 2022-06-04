<?php

namespace App\Models;

use App\Models\Base\Registration as BaseRegistration;

class Registration extends BaseRegistration
{
	protected $hidden = [
		self::PASSWORD
	];

	protected $fillable = [
		self::U_ID,
		self::EMAIL,
		self::EMAIL_VERIFIED,
		self::EMAIL_VERIFIED_AT,
		self::PASSWORD,
		self::PHONE_NUMBER,
		self::FIRST_NAME,
		self::LAST_NAME,
		self::INITIALS
	];
}
