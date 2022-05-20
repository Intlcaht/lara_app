<?php

namespace App\Models;

use App\Models\Base\Resource as BaseResource;

class Resource extends BaseResource
{
	protected $fillable = [
		self::NAME,
		self::STATUS
	];
}
