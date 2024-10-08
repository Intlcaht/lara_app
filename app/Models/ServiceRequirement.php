<?php

namespace App\Models;

use App\Models\Base\ServiceRequirement as BaseServiceRequirement;

class ServiceRequirement extends BaseServiceRequirement
{
	protected $fillable = [
		self::U_ID,
		self::TITLE,
		self::DESCRIPTION,
		self::PARENT_REQUIREMENTS_ID,
		self::SERVICE_U_ID
	];
}
