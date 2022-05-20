<?php

namespace App\Models;

use App\Models\Base\Blog as BaseBlog;

class Blog extends BaseBlog
{
	protected $fillable = [
		self::U_ID,
		self::BUSINESS_PROFILE_U_ID,
		self::TITLE,
		self::SLUG,
		self::ARTICLE,
		self::ESTIMATED_READ_TIME
	];
}
