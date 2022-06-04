<?php

namespace App\Models;

use App\Models\Base\OrderStatusBusinessProfile as BaseOrderStatusBusinessProfile;

class OrderStatusBusinessProfile extends BaseOrderStatusBusinessProfile
{
	protected $fillable = [
		self::PROFILE_U_ID,
		self::ORDER_STATUS_PROVIDERS_U_ID
	];
}
