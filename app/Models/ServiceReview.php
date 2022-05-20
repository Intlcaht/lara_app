<?php

namespace App\Models;

use App\Models\Base\ServiceReview as BaseServiceReview;

class ServiceReview extends BaseServiceReview
{
	protected $fillable = [
		self::SERVICE_U_ID,
		self::TITLE,
		self::COMMENT,
		self::RATING,
		self::BUSINESS_PROFILE_SERVICE_U_ID
	];
}
