<?php

namespace App\Models;

use App\Models\Base\OrderStatusProvider as BaseOrderStatusProvider;

class OrderStatusProvider extends BaseOrderStatusProvider
{
	protected $fillable = [
		self::U_ID,
		self::ORDER_STATUS_U_ID,
		self::USED_AMOUNT,
		self::ESTIMATED_COMPLETE_PERCENTAGE_OF_ALL_TASKS,
		self::REMARKS_TO_CLIENTS,
		self::REMARKS_TO_PROVIDERS,
		self::COMPLETED_AT,
		self::STARTED_AT,
		self::COMPLETE_STATUS_ORDER_U_ID,
		self::CURRENT_STATUS_ORDER_U_ID,
		self::STATUS_STATUS,
		self::STATUS_REMARKS,
		self::CLIENT_LOCATION_LAT,
		self::CLIENT_LOCATION_LONG,
		self::BID_AMOUNT
	];
}
