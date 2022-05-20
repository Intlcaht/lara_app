<?php

namespace App\Models;

use App\Models\Base\ServiceCategory as BaseServiceCategory;

class ServiceCategory extends BaseServiceCategory
{
	protected $fillable = [
		self::U_ID,
		self::TITLE,
		self::DESCRIPTION,
		self::TAGLINE,
		self::PARENT_CATEGORY_U_ID
	];
}
