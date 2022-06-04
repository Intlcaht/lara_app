<?php

namespace App\Models;

use App\Models\Base\Order as BaseOrder;

class Order extends BaseOrder
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_U_ID,
		self::PROJECT_U_ID,
		self::BUSINESS_PROFILE_U_ID,
		self::DESCRIPTION,
		self::SERVICE_TAGS_BUSINESS_PROFILE_JOINT_DURATION_U_ID,
		self::SERVICE_NOTIFICATION_U_ID
	];
}
