<?php

namespace App\Models;

use App\Models\Base\ProjectTask as BaseProjectTask;

class ProjectTask extends BaseProjectTask
{
	protected $fillable = [
		self::U_ID,
		self::CHECK_IN_U_ID,
		self::CHECK_OUT_U_ID,
		self::NAME,
		self::DESCRIPTION,
		self::PROJECT_U_ID,
		self::PROJECT_TASK_GROUP_U_ID,
		self::PROJECT_TASK_U_ID,
		self::TIMELINE_START,
		self::TIMELINE_END,
		self::STATUS_LABEL,
		self::PROJECT_STATUS_LABELS_ID,
		self::ESTIMATED_TIME_START,
		self::ESTIMATED_TIME_END,
		self::COMPLETED,
		self::ORDER_STATUS_USERS_U_ID
	];
}
