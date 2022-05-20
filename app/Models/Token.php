<?php

namespace App\Models;

use App\Models\Base\Token as BaseToken;

class Token extends BaseToken
{
	protected $fillable = [
		self::FIREBASE_ID,
		self::DEVICE_TYPE,
		self::DEVICE_ID
	];
}
