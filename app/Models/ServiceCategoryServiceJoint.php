<?php

namespace App\Models;

use App\Models\Base\ServiceCategoryServiceJoint as BaseServiceCategoryServiceJoint;

class ServiceCategoryServiceJoint extends BaseServiceCategoryServiceJoint
{
	protected $fillable = [
		self::U_ID,
		self::CATEGORY_U_ID,
		self::SERVICE_U_ID
	];
}
