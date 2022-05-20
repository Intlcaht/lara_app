<?php

namespace App\Models;

use App\Models\Base\BusinessAttachment as BaseBusinessAttachment;

class BusinessAttachment extends BaseBusinessAttachment
{
	protected $fillable = [
		self::TYPE,
		self::NAME,
		self::URL,
		self::BUSINESS_PROFILE_U_ID
	];
}
