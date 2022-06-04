<?php

namespace App\Models;

use App\Models\Base\OrderStatusClient as BaseOrderStatusClient;

class OrderStatusClient extends BaseOrderStatusClient
{
	protected $fillable = [
		self::USER_U_ID,
		self::ORDER_STATUS_USER_U_ID
	];
}
