<?php

namespace App\Models;

use App\Models\Base\OrderStatus as BaseOrderStatus;

class OrderStatus extends BaseOrderStatus
{
	protected $fillable = [
		self::U_ID,
		self::STATUS,
		self::DESCRIPTION,
		self::SERVICES_U_ID,
		self::NEXT_ORDER_STATUS_U_ID,
		self::CLIENT_COLLABORATION_ALLOWED,
		self::STATUS_COMMAND,
		self::REQUIRES_CLIENT_LOCATION,
		self::BID_ORDER_STATUS_PROVIDERS_U_ID
	];
}
