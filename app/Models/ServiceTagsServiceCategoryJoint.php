<?php

namespace App\Models;

use App\Models\Base\ServiceTagsServiceCategoryJoint as BaseServiceTagsServiceCategoryJoint;

class ServiceTagsServiceCategoryJoint extends BaseServiceTagsServiceCategoryJoint
{
	protected $fillable = [
		self::TAG_U_ID,
		self::CATEGORY_U_ID
	];
}
