<?php

namespace App\Models;

use App\Models\Base\OrderAttachment as BaseOrderAttachment;

class OrderAttachment extends BaseOrderAttachment
{
	protected $fillable = [
		self::U_ID,
		self::ORDER_U_ID,
		self::TYPE,
		self::NAME,
		self::URL
	];
}
