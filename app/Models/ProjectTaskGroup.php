<?php

namespace App\Models;

use App\Models\Base\ProjectTaskGroup as BaseProjectTaskGroup;

class ProjectTaskGroup extends BaseProjectTaskGroup
{
	protected $fillable = [
		self::U_ID,
		self::NAME,
		self::DESCRIPTION
	];
}
