<?php

namespace App\Models;

use App\Models\Base\ServiceTagsBusinessProfileJoint as BaseServiceTagsBusinessProfileJoint;

class ServiceTagsBusinessProfileJoint extends BaseServiceTagsBusinessProfileJoint
{
	protected $fillable = [
		self::U_ID,
		self::TAG_U_ID,
		self::PROFILE_U_ID,
		self::RATE_AMOUNT,
		self::RATE_TYPE,
		self::PRIVACY_POLICY
	];
}
