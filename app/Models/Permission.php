<?php

namespace App\Models;

use App\Models\Base\Permission as BasePermission;

class Permission extends BasePermission
{
	protected $fillable = [
		self::NAME,
		self::GUARD_NAME
	];
}
