<?php

namespace App\Models;

use App\Models\Base\Chat as BaseChat;

class Chat extends BaseChat
{
	protected $fillable = [
		self::U_ID,
		self::CHECK_IN_U_ID,
		self::ORDER_STATUS_PROVIDER_U_ID,
		self::MESSAGE,
		self::SENDER_U_ID,
		self::RECEIVER_U_ID,
		self::ATTACHMENT_URL,
		self::ATTACHMENT_TYPE,
		self::DELIVERY_STATUS
	];
}
