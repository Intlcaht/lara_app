<?php

namespace App\Models;

use App\Models\Base\CheckIn as BaseCheckIn;

class CheckIn extends BaseCheckIn
{
	protected $fillable = [
		self::U_ID,
		self::PROJECT_U_ID,
		self::CHECKIN_DESCRIPTION,
		self::PROJECT_TASK_GROUP_U_ID,
		self::ESTIMATED_COMPLETION_COVERAGE_PERCENTAGE,
		self::ESTIMATED_COMPLETION_COST,
		self::ESTIMATED_COMPLETION_TIME,
		self::ESTIMATED_COMPLETION_TIME_TYPE
	];
}
