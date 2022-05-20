<?php

namespace App\Models;

use App\Models\Base\ServiceTagsBusinessProfileJointDuration as BaseServiceTagsBusinessProfileJointDuration;

class ServiceTagsBusinessProfileJointDuration extends BaseServiceTagsBusinessProfileJointDuration
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_TAGS_BUSINESS_PROFILE_JOINT_U_ID,
		self::DAY_OF_WEEK,
		self::DURATION_TYPE,
		self::TIME_START,
		self::TIME_END
	];
}
