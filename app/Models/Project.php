<?php

namespace App\Models;

use App\Models\Base\Project as BaseProject;

class Project extends BaseProject
{
	protected $fillable = [
		self::U_ID,
		self::NAME,
		self::DESCRIPTION,
		self::BUDGET_TYPE,
		self::BUDGET,
		self::PROJECT_PROFILE_U_ID,
		self::TYPE,
		self::STATUS,
		self::DURATION,
		self::DURATION_TYPE,
		self::LOCATIONSID
	];
}
