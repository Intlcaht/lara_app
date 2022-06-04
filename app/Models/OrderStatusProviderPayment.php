<?php

namespace App\Models;

use App\Models\Base\OrderStatusProviderPayment as BaseOrderStatusProviderPayment;

class OrderStatusProviderPayment extends BaseOrderStatusProviderPayment
{
	protected $fillable = [
		self::ORDER_STATUS_PROVIDER_U_ID,
		self::PAYMENT_U_ID
	];
}
