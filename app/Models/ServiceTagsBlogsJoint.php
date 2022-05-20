<?php

namespace App\Models;

use App\Models\Base\ServiceTagsBlogsJoint as BaseServiceTagsBlogsJoint;

class ServiceTagsBlogsJoint extends BaseServiceTagsBlogsJoint
{
	protected $fillable = [
		self::SERVICE_TAG_U_ID,
		self::BLOG_U_ID
	];
}
