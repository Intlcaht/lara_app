<?php

namespace App\Models;

use App\Models\Base\UserRole as BaseUserRole;

class UserRole extends BaseUserRole
{
	protected $fillable = [
		self::USERTYPE,
		self::USER_U_ID
	];
}
